<?php


namespace App\Services\Speedtest;


use App\Console\Commands\RunSpeedtestPL;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome\SupportsChrome;
use Laravel\Dusk\Concerns\ProvidesBrowser;

abstract class BrowserStack
{
    use ProvidesBrowser;
    use SupportsChrome;

    const LOCALHOST_URL = 'http://localhost:9515';

    const SPEEDTEST_PL_URL = 'https://www.speedtest.pl/';
    const SPEEDTEST_NET_URL = 'https://www.speedtest.net/';

    const SPEEDTEST_NET_ACCEPTBUTTON = '#_evidon-banner-acceptbutton';

    const SPEEDTEST_PL_START_SELECTOR = '#start-btn';
    const SPEEDTEST_NET_START_SELECTOR = '.start-text';

    const SPEEDTEST_PL_RESULT_SELECTOR = '.wynik-box';
    const SPEEDTEST_NET_RESULT_SELECTOR = '.result-label';
    /**
     * @var null
     */
    private $proxy;

    public function __construct($proxy = null) {

        $this->proxy = $proxy;
    }

    abstract public function run(int $provider);

    public static function IP($ip){


    }

    protected function driver()
    {

        $options = (new ChromeOptions)->addArguments(collect([
            '--window-size=1920,1080',
        ])->unless($this->hasHeadlessDisabled(), function ($items) {
            return $items->merge([
                '--disable-gpu',
                '--headless'
            ]);
        })->all());

        Browser::$storeConsoleLogAt = 'storage/logs';
        Browser::$storeScreenshotsAt = 'storage/logs';


        $capabilities = DesiredCapabilities::chrome()->setCapability(
            ChromeOptions::CAPABILITY, $options
        );


        if($this->proxy !== null) {
            $proxy = [
                'proxyType' => 'manual',
                'httpProxy' => $this->proxy,
                'sslProxy' => $this->proxy,
            ];

            $capabilities->setCapability(WebDriverCapabilityType::PROXY, $proxy);
        }


        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? self::LOCALHOST_URL,
            $capabilities
        );
    }


    protected function hasHeadlessDisabled()
    {
        return isset($_SERVER['DUSK_HEADLESS_DISABLED']) ||
            isset($_ENV['DUSK_HEADLESS_DISABLED']);
    }

    public function getName($arg = '') {
        return '';
    }

}
