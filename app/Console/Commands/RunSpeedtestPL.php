<?php

namespace App\Console\Commands;

use App\Services\Speedtest\Speedtests;
use Illuminate\Console\Command;
use App\Services\Speedtest\BrowserStack;

class RunSpeedtestPL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedtestpl:run {proxy?}';

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
        $proxy = $this->argument('proxy');

        $service = new Speedtests($proxy);

        $service->run(Speedtests::SPEEDTEST_PL);

        return 0;
    }
}
