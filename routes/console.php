<?php

use App\Models\Site;
use App\Services\MonitoringService;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {

    $sites = Site::where('is_active', true)->get();

    $monitoringService = app(MonitoringService::class);

    foreach ($sites as $site) {

        // Get the last verification
        $lastCheck = $site->verifications()
            ->latest('checked_at')
            ->first();

        // Check if the site needs a new verification
        if (
            !$lastCheck ||
            $lastCheck->checked_at->addMinutes($site->monitoring_interval)->isPast()
        ) {
            $monitoringService->check($site);
        }
    }

})->everyMinute();