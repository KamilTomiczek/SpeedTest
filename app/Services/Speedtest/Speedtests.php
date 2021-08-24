<?php


namespace App\Services\Speedtest;


use App\Models\SpeedTestHistory;
use Laravel\Dusk\Browser;
use App\Helpers\MathHelpers;
use PharIo\Manifest\ManifestDocumentException;

class Speedtests extends BrowserStack
{
    const SPEEDTEST_PL = 1;
    const SPEEDTEST_NET = 2;

    public function run(int $provider = self::SPEEDTEST_PL)
    {
        static::startChromeDriver();

        switch ($provider){
            case 1:
                $this->SpeedtestPl();
                break;
            case 2:
                $this->SpeedtestNet();
                break;
        }

    }

    public function SpeedtestPl(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->visit(self::SPEEDTEST_PL_URL)
                ->waitFor(self::SPEEDTEST_PL_START_SELECTOR)
                ->click(self::SPEEDTEST_PL_START_SELECTOR)
                ->waitFor(self::SPEEDTEST_PL_RESULT_SELECTOR, 120);

            $this->insert(
                $browser->text('#ping-result'),
                $browser->text('#download-result'),
                $browser->text('#upload-result'),
                1
            );
        });
    }

    public function SpeedtestNet(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->visit(self::SPEEDTEST_NET_URL)
                ->waitFor(self::SPEEDTEST_NET_ACCEPTBUTTON, 20)
                ->click(self::SPEEDTEST_NET_ACCEPTBUTTON)
                ->waitFor(self::SPEEDTEST_NET_START_SELECTOR, 20)
                ->click(self::SPEEDTEST_NET_START_SELECTOR)
                ->waitFor(self::SPEEDTEST_NET_RESULT_SELECTOR, 120);

            $this->insert(
                $browser->text('.ping-speed'),
                $browser->text('.download-speed'),
                $browser->text('.upload-speed'),
                2
            );
        });
    }

    public function insert(int $ping, float $download_speed, float $upload_speed, int $provider_id): void
    {
        SpeedTestHistory::create([
            'ping' => $ping . ' ms',
            'download_speed' => MathHelpers::multiply($download_speed, 1000) . ' kb/s',
            'upload_speed' => MathHelpers::multiply($upload_speed, 1000) . ' kb/s',
            'provider_id' => $provider_id
        ]);
    }
}
