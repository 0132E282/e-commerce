<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteReadNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:clear-read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all read notifications';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('notifications')->whereNotNull('read_at')->whereDate('created_at', '<', Carbon::now()->subDay(10))->delete();
        $this->info('All read notifications have been deleted.');
    }
}
