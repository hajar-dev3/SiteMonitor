<?php

namespace App\Services;

use App\Models\Site;
use App\Models\Verification;
use App\Models\Alerte;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class MonitoringService
{
    /**
     * Vérifie la disponibilité d'un site.
     */
    public function check(Site $site): Verification
    {
        $startTime = microtime(true);

        // Dernière vérification avant le nouveau check
        $previousVerification = $site->verifications()
            ->latest('checked_at')
            ->first();

        try {

            // Envoyer une requête HTTP au site
            $response = Http::timeout(10)
                ->withoutVerifying()
                ->get($site->url);

            // Calcul du temps de réponse en millisecondes
            $responseTime = round(
                (microtime(true) - $startTime) * 1000
            );

            // Déterminer le statut
            // IMPORTANT : UP / DOWN pour les statistiques
            $status = $response->successful()
                ? 'UP'
                : 'DOWN';

            // Créer la vérification
            $verification = $site->verifications()->create([
                'status' => $status,
                'response_time' => $responseTime,
                'http_code' => $response->status(),
                'checked_at' => Carbon::now(),
                'error_message' => $response->successful()
                    ? null
                    : 'HTTP error: ' . $response->status(),
            ]);

            /*
             * =========================================================
             * UP -> DOWN
             * Le site vient de tomber.
             * =========================================================
             */
            if (
                $status === 'DOWN' &&
                $previousVerification &&
                $previousVerification->status === 'UP'
            ) {
                $this->createDownAlert(
                    $site,
                    $verification
                );
            }

            /*
             * =========================================================
             * DOWN -> UP
             * Le site vient de revenir en ligne.
             * =========================================================
             */
            if (
                $status === 'UP' &&
                $previousVerification &&
                $previousVerification->status === 'DOWN'
            ) {
                $this->createRecoveryAlert(
                    $site,
                    $verification
                );
            }

            /*
             * =========================================================
             * Premier check DOWN
             * Le site n'a jamais été vérifié auparavant.
             * =========================================================
             */
            if (
                $status === 'DOWN' &&
                !$previousVerification
            ) {
                $this->createDownAlert(
                    $site,
                    $verification
                );
            }

            return $verification;

        } catch (\Throwable $e) {

            // Calcul du temps même en cas d'erreur
            $responseTime = round(
                (microtime(true) - $startTime) * 1000
            );

            /*
             * =========================================================
             * Enregistrer la vérification comme DOWN
             * =========================================================
             */
            $verification = $site->verifications()->create([
                'status' => 'DOWN',
                'response_time' => $responseTime,
                'http_code' => null,
                'checked_at' => Carbon::now(),
                'error_message' => $e->getMessage(),
            ]);

            /*
             * =========================================================
             * Envoyer l'alerte uniquement si :
             *
             * - c'est le premier check
             * - OU le site était UP avant
             * =========================================================
             */
            if (
                !$previousVerification ||
                $previousVerification->status === 'UP'
            ) {
                $this->createDownAlert(
                    $site,
                    $verification
                );
            }

            return $verification;
        }
    }

    /**
     * Créer une alerte lorsque le site est DOWN.
     */
    private function createDownAlert(
        Site $site,
        Verification $verification
    ): void {

        $user = $site->user;

        // Créer l'alerte
        $alert = Alerte::create([
            'verification_id' => $verification->id,
            'user_id' => $user->id,
            'type' => 'down',
            'message' => "Le site {$site->name} est actuellement indisponible.",
            'is_sent' => false,
            'sent_at' => null,
        ]);

        // Envoyer l'email
        Mail::raw(
            "Bonjour {$user->name},\n\n"
            . "Votre site {$site->name} est actuellement indisponible.\n\n"
            . "URL : {$site->url}\n"
            . "Erreur : {$verification->error_message}\n"
            . "Date : {$verification->checked_at->format('d/m/Y H:i:s')}\n\n"
            . "SiteMonitor",
            function ($message) use ($user, $site) {

                $message
                    ->to($user->email)
                    ->subject(
                        "🚨 SiteMonitor - {$site->name} est DOWN"
                    );
            }
        );

        // Marquer l'alerte comme envoyée
        $alert->update([
            'is_sent' => true,
            'sent_at' => Carbon::now(),
        ]);
    }

    /**
     * Créer une alerte lorsque le site revient en ligne.
     */
    private function createRecoveryAlert(
        Site $site,
        Verification $verification
    ): void {

        $user = $site->user;

        // Créer l'alerte de récupération
        $alert = Alerte::create([
            'verification_id' => $verification->id,
            'user_id' => $user->id,
            'type' => 'recovery',
            'message' => "Le site {$site->name} est de nouveau disponible.",
            'is_sent' => false,
            'sent_at' => null,
        ]);

        // Envoyer l'email
        Mail::raw(
            "Bonjour {$user->name},\n\n"
            . "Bonne nouvelle ! Votre site {$site->name} est de nouveau disponible.\n\n"
            . "URL : {$site->url}\n"
            . "Statut : UP\n"
            . "Temps de réponse : {$verification->response_time} ms\n"
            . "Code HTTP : {$verification->http_code}\n"
            . "Date : {$verification->checked_at->format('d/m/Y H:i:s')}\n\n"
            . "SiteMonitor",
            function ($message) use ($user, $site) {

                $message
                    ->to($user->email)
                    ->subject(
                        "✅ SiteMonitor - {$site->name} est de nouveau UP"
                    );
            }
        );

        // Marquer l'alerte comme envoyée
        $alert->update([
            'is_sent' => true,
            'sent_at' => Carbon::now(),
        ]);
    }
}