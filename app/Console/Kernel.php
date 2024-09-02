<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:run --only-db --disable-notifications')->everyFifteenMinutes();

        //Schedule to create recurring invoices
        $schedule->command('pos:generateSubscriptionInvoices')->dailyAt('10:00');
        $schedule->command('pos:updateRewardPoints')->dailyAt('23:45');
        $schedule->command('backup:cleanup --disable-notifications')->daily();
        $schedule->command('pos:autoSendPaymentReminder')->dailyAt('8:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
