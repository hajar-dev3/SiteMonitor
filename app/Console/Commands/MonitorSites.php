<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Site;
use App\Services\MonitoringService;

class MonitorSites extends Command
{
    /**
     * Command name.
     */
    protected $signature = 'app:monitor-sites';

    /**
     * Command description.
     */
    protected $description = 'Check all active websites';

    /**
     * Execute the console command.
     */
    public function handle(MonitoringService $monitoringService)
    {
        $sites = Site::where('is_active', true)->get();

        if ($sites->isEmpty()) {
            $this->info('No active websites to monitor.');
            return Command::SUCCESS;
        }

        foreach ($sites as $site) {
            $this->info("Checking: {$site->name}");

            $verification = $monitoringService->check($site);

            if ($verification->status === 'up') {
                $this->info(
                    "✓ {$site->name} is UP ({$verification->response_time} ms)"
                );
            } else {
                $this->error(
                    "✗ {$site->name} is DOWN"
                );
            }
        }

        $this->info('Monitoring check completed.');

        return Command::SUCCESS;
    }
}