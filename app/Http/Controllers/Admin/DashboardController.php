<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Site;
use App\Models\Verification;

class DashboardController extends Controller
{
    public function index()
    {
        // Total users
        $totalUsers = User::count();

        // Total monitored sites
        $totalSites = Site::count();

        // Get the latest verification for every site
        $latestVerifications = Verification::select('site_id', 'status')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('verifications')
                    ->groupBy('site_id');
            })
            ->get();

        // Online sites
        $onlineSites = $latestVerifications
            ->where('status', 'UP')
            ->count();

        // Offline sites
        $downSites = $latestVerifications
            ->where('status', 'DOWN')
            ->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalSites',
            'onlineSites',
            'downSites'
        ));
    }
}