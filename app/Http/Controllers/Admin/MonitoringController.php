<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Verification;

class MonitoringController extends Controller
{
    /**
     * Display monitoring data for all users/sites.
     */
    public function index()
    {
        // =====================================================
        // ALL SITES
        // =====================================================

        $sites = Site::with([
                'user',
            ])
            ->withCount('verifications')
            ->with([
                'verifications' => function ($query) {
                    $query->latest('checked_at')->limit(1);
                }
            ])
            ->latest()
            ->get();


        // =====================================================
        // RECENT VERIFICATIONS
        // =====================================================

        $recentVerifications = Verification::with([
                'site',
                'site.user',
            ])
            ->latest('checked_at')
            ->take(20)
            ->get();


        // =====================================================
        // GLOBAL STATISTICS
        // =====================================================

        $totalSites = Site::count();

        $activeSites = Site::where('is_active', true)->count();

        $inactiveSites = Site::where('is_active', false)->count();

        $totalVerifications = Verification::count();

        $successfulVerifications = Verification::where('status', 'UP')
            ->count();

        $failedVerifications = Verification::where('status', 'DOWN')
            ->count();


        // =====================================================
        // RETURN VIEW
        // =====================================================

        return view('admin.monitoring.index', compact(
            'sites',
            'recentVerifications',

            'totalSites',
            'activeSites',
            'inactiveSites',

            'totalVerifications',
            'successfulVerifications',
            'failedVerifications',
        ));
    }
}