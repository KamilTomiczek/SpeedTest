<?php

namespace App\Console\Commands;

use App\Services\Speedtest\Speedtests;
use Illuminate\Console\Command;

class RunSpeedtestNet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedtestnet:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $service = new Speedtests();

        $service->run(Speedtests::SPEEDTEST_NET);

        return 0;
    }


}
