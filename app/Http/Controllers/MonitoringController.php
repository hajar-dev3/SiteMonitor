<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display the monitoring page.
     */
    public function index()
    {
        $user = auth()->user();

        // Get user's websites with their latest verification
        $sites = $user->sites()
            ->with([
                'verifications' => function ($query) {
                    $query->latest('checked_at')->limit(1);
                }
            ])
            ->latest()
            ->get();

        // Count current UP / DOWN websites
        $upSites = 0;
        $downSites = 0;

        foreach ($sites as $site) {

            $lastCheck = $site->verifications->first();

            if ($lastCheck?->status === 'up') {
                $upSites++;
            }

            if ($lastCheck?->status === 'down') {
                $downSites++;
            }
        }

        return view('monitoring.index', compact(
            'sites',
            'upSites',
            'downSites'
        ));
    }
}
