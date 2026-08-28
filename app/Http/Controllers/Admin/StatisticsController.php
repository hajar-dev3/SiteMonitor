<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Site;
use App\Models\Verification;

class StatisticsController extends Controller
{
    public function index()
    {
        // =====================================================
        // GLOBAL STATISTICS
        // =====================================================

        $totalUsers = User::count();

        $totalSites = Site::count();

        $activeSites = Site::where('is_active', true)->count();

        $inactiveSites = Site::where('is_active', false)->count();

        $totalVerifications = Verification::count();

        // Database uses UP / DOWN
        $successfulVerifications = Verification::where('status', 'UP')->count();

        $failedVerifications = Verification::where('status', 'DOWN')->count();

        $successRate = $totalVerifications > 0
            ? round(($successfulVerifications / $totalVerifications) * 100, 1)
            : 0;

        $failureRate = $totalVerifications > 0
            ? round(($failedVerifications / $totalVerifications) * 100, 1)
            : 0;

        $averageResponseTime = Verification::whereNotNull('response_time')
            ->avg('response_time');

        $averageResponseTime = round($averageResponseTime ?? 0, 2);


        // =====================================================
        // LAST 24 HOURS
        // =====================================================

        $verificationsLast24Hours = Verification::where(
            'checked_at',
            '>=',
            now()->subHours(24)
        )->count();


        // =====================================================
        // LAST 7 DAYS
        // =====================================================

        $verificationsLast7Days = Verification::where(
            'checked_at',
            '>=',
            now()->subDays(7)
        )->count();


        // =====================================================
        // SUCCESSFUL / FAILED LAST 7 DAYS
        // =====================================================

        $successfulLast7Days = Verification::where('status', 'UP')
            ->where('checked_at', '>=', now()->subDays(7))
            ->count();

        $failedLast7Days = Verification::where('status', 'DOWN')
            ->where('checked_at', '>=', now()->subDays(7))
            ->count();


        // =====================================================
        // CHART 1
        // VERIFICATIONS LAST 7 DAYS
        // =====================================================

        $verificationLabels = [];

        $verificationSuccessData = [];

        $verificationFailedData = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = now()->subDays($i);

            $verificationLabels[] = $date->format('d/m');

            // UP = Successful
            $verificationSuccessData[] = Verification::where(
                'status',
                'UP'
            )
                ->whereDate(
                    'checked_at',
                    $date->toDateString()
                )
                ->count();

            // DOWN = Failed
            $verificationFailedData[] = Verification::where(
                'status',
                'DOWN'
            )
                ->whereDate(
                    'checked_at',
                    $date->toDateString()
                )
                ->count();
        }


        // =====================================================
        // CHART 2
        // SITE STATUS
        // =====================================================

        $siteStatusData = [
            $activeSites,
            $inactiveSites,
        ];


        // =====================================================
        // CHART 3
        // VERIFICATION STATUS
        // =====================================================

        $verificationStatusData = [
            $successfulVerifications,
            $failedVerifications,
        ];


        // =====================================================
        // CHART 4
        // RESPONSE TIME LAST 7 DAYS
        // =====================================================

        $responseTimeLabels = [];

        $responseTimeData = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = now()->subDays($i);

            $responseTimeLabels[] = $date->format('d/m');

            $average = Verification::whereDate(
                'checked_at',
                $date->toDateString()
            )
                ->whereNotNull('response_time')
                ->avg('response_time');

            $responseTimeData[] = round(
                $average ?? 0,
                2
            );
        }


        // =====================================================
        // RECENT VERIFICATIONS
        // =====================================================

        $recentVerifications = Verification::with('site')
            ->latest('checked_at')
            ->take(10)
            ->get();


        // =====================================================
        // MOST CHECKED SITES
        // =====================================================

        $topSites = Site::withCount('verifications')
            ->orderByDesc('verifications_count')
            ->take(5)
            ->get();


        // =====================================================
        // SYSTEM HEALTH
        // =====================================================

        if ($successRate >= 95) {

            $systemHealth = 'Excellent';

            $systemHealthClass = 'excellent';

        } elseif ($successRate >= 85) {

            $systemHealth = 'Good';

            $systemHealthClass = 'good';

        } elseif ($successRate >= 70) {

            $systemHealth = 'Warning';

            $systemHealthClass = 'warning';

        } else {

            $systemHealth = 'Critical';

            $systemHealthClass = 'critical';
        }


        // =====================================================
        // RETURN VIEW
        // =====================================================

        return view(
            'admin.statistics.index',
            compact(

                // Global
                'totalUsers',
                'totalSites',
                'activeSites',
                'inactiveSites',

                // Verifications
                'totalVerifications',
                'successfulVerifications',
                'failedVerifications',

                // Rates
                'successRate',
                'failureRate',

                // Performance
                'averageResponseTime',

                // Periods
                'verificationsLast24Hours',
                'verificationsLast7Days',
                'successfulLast7Days',
                'failedLast7Days',

                // Chart 1
                'verificationLabels',
                'verificationSuccessData',
                'verificationFailedData',

                // Chart 2
                'siteStatusData',

                // Chart 3
                'verificationStatusData',

                // Chart 4
                'responseTimeLabels',
                'responseTimeData',

                // Recent
                'recentVerifications',

                // Top sites
                'topSites',

                // Health
                'systemHealth',
                'systemHealthClass'
            )
        );
    }
}