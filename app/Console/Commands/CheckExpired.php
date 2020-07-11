<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Booking;

class CheckExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically update status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Booking::whereDate('check_out', '<', now())->where('status', 1)->update(['status' => 0]);
        // $check = DB::table('booking')->where([
        //     [DB::raw('datediff(current_date(), check_out)'), '>=', 1],
        //     ['status', 1]
        // ])->count();
        // echo $check;
    }
}
