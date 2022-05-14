<?php

namespace App\Console;
use App\Console\Commands\CartEmpty;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Cart;

use User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //  
        \App\Console\Commands\CartEmpty::class,
     
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //  $schedule->command('cart:empty')
        //  ->everyMinute();
        //  $schedule->call(function () {
        //    DB::table('carts')->delete();
        // })->everyMinute();
        $schedule->job(new CartEmpty)->everyMinute();
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
