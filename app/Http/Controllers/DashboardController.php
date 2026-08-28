<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $user = auth()->user();

        // User's websites
        $sites = $user->sites()
            ->with([
                'verifications' => function ($query) {
                    $query->latest('checked_at');
                }
            ])
            ->latest()
            ->get();

        // Total websites
        $totalSites = $sites->count();

        // Websites currently online
        $onlineSites = $sites->filter(function ($site) {
            return strtoupper(
                $site->verifications->first()?->status ?? ''
            ) === 'UP';
        })->count();

        // Websites currently down
        $downSites = $sites->filter(function ($site) {
            return strtoupper(
                $site->verifications->first()?->status ?? ''
            ) === 'DOWN';
        })->count();

        // Average uptime
        $totalChecks = $sites->sum(function ($site) {
            return $site->verifications->count();
        });

        $upChecks = $sites->sum(function ($site) {
            return $site->verifications
                ->filter(function ($verification) {
                    return strtoupper($verification->status) === 'UP';
                })
                ->count();
        });

        $averageUptime = $totalChecks > 0
            ? round(($upChecks / $totalChecks) * 100, 1)
            : 0;

        // Recent checks - keep latest 10
        $recentChecks = $sites
            ->flatMap(function ($site) {
                return $site->verifications;
            })
            ->sortByDesc('checked_at')
            ->take(10)
            ->values();

        // Latest check
        $latestCheck = $recentChecks->first();

        // Recent alerts
        $recentAlerts = $user->alertes()
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'sites',
            'totalSites',
            'onlineSites',
            'downSites',
            'averageUptime',
            'recentChecks',
            'latestCheck',
            'recentAlerts'
        ));
    }
}