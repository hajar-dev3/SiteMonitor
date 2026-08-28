<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    /**
     * Display monitoring statistics for the authenticated user.
     */
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | USER'S SITES
        |--------------------------------------------------------------------------
        */

        $sites = $user->sites()
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | USER'S VERIFICATIONS
        |--------------------------------------------------------------------------
        |
        | We get verifications through the user's sites.
        | Status values in the database are UP / DOWN.
        |
        */

        $verifications = Verification::whereIn(
            'site_id',
            $sites->pluck('id')
        )
            ->orderBy('checked_at')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | BASIC STATISTICS
        |--------------------------------------------------------------------------
        */

        $totalChecks = $verifications->count();

        $successfulChecks = $verifications
            ->where('status', 'UP')
            ->count();

        $failedChecks = $verifications
            ->where('status', 'DOWN')
            ->count();

        $averageUptime = $totalChecks > 0
            ? round(($successfulChecks / $totalChecks) * 100, 2)
            : 0;

        $averageResponseTime = $verifications
            ->whereNotNull('response_time')
            ->avg('response_time');

        $averageResponseTime = round($averageResponseTime ?? 0, 2);

        /*
        |--------------------------------------------------------------------------
        | LAST 7 DAYS
        |--------------------------------------------------------------------------
        */

        $last7Days = collect();

        for ($i = 6; $i >= 0; $i--) {

            $date = Carbon::today()->subDays($i);

            $dayVerifications = $verifications->filter(function ($verification) use ($date) {

                if (!$verification->checked_at) {
                    return false;
                }

                return Carbon::parse($verification->checked_at)
                    ->isSameDay($date);
            });

            $total = $dayVerifications->count();

            $up = $dayVerifications
                ->where('status', 'UP')
                ->count();

            $down = $dayVerifications
                ->where('status', 'DOWN')
                ->count();

            $uptime = $total > 0
                ? round(($up / $total) * 100, 2)
                : 0;

            $responseTime = $dayVerifications
                ->whereNotNull('response_time')
                ->avg('response_time');

            $last7Days->push([
                'date' => $date->format('d/m'),

                'label' => $date->format('D'),

                'total' => $total,

                'up' => $up,

                'down' => $down,

                'uptime' => $uptime,

                'response_time' => round($responseTime ?? 0),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | CHART DATA
        |--------------------------------------------------------------------------
        */

        $chartLabels = $last7Days
            ->pluck('date')
            ->values()
            ->all();

        $chartSuccessful = $last7Days
            ->pluck('up')
            ->values()
            ->all();

        $chartFailed = $last7Days
            ->pluck('down')
            ->values()
            ->all();

        $chartUptime = $last7Days
            ->pluck('uptime')
            ->values()
            ->all();

        $chartResponseTime = $last7Days
            ->pluck('response_time')
            ->values()
            ->all();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('statistics.statistics', compact(

            'sites',

            'verifications',

            'totalChecks',

            'successfulChecks',

            'failedChecks',

            'averageUptime',

            'averageResponseTime',

            'chartLabels',

            'chartSuccessful',

            'chartFailed',

            'chartUptime',

            'chartResponseTime',

        ));
    }
}