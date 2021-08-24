<?php

namespace Tests\Browser;

use App\Services\Speedtest\Speedtests;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\SpeedTestHistory;

class SpeedTestTest extends DuskTestCase
{

    public function test_speedtest_pl_service()
    {
        $this->truncate();

        $this->assertEquals(1, 1);

        $this->assertDirectoryExists('C:\laragon\www\SpeedTest\tests\Browser', "Exist");

        for($x = 1; $x <= 5; $x++){
            $speedtest = new Speedtests();
            $speedtest->run();
            $this->assertDatabaseCount('speedtest_history', $x);
        }

        $this->assertDatabaseCount('speedtest_history', 5);
    }
    public function test_speedtest_net_service()
    {
        $this->truncate();

        $speedtest = new Speedtests();
        $speedtest->run(Speedtests::SPEEDTEST_NET);

        $this->assertEquals(1, 1);
    }

}
