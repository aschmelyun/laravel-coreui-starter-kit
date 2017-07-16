<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Ping;
use App\Website;
use GuzzleHttp\TransferStats;
use Log;

class PingWebsites extends Command
{

    protected $signature = 'websites:ping';
    protected $description = 'Ping all actively monitored websites';

    public $responses = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->useRollingCurl();
    }

    public function useRollingCurl()
    {
        $websites = Website::where('monitoring', 1)
            ->pluck('id', 'url')
            ->toArray();

        $rollingCurl = new \RollingCurl\RollingCurl();
        $rollingCurl
            ->setOptions(array(
                CURLOPT_HEADER => true,
                CURLOPT_NOBODY => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_HTTPHEADER => [],
                CURLOPT_TIMEOUT => 10
            ));

        foreach ($websites as $url => $id) {
            $request = new \RollingCurl\Request($url);
            $rollingCurl->add($request);
            $rollingCurl->add($request);
        }

        $rollingCurl
            ->setCallback(function(\RollingCurl\Request $request, \RollingCurl\RollingCurl $rollingCurl) use($websites) {
                Log::info('Website pinged: ' . $request->getUrl());
                $info = $request->getResponseInfo();
                $this->responses[$request->getUrl()][] = $info['starttransfer_time'];
                Log::info('Transfer time: ' . $info['starttransfer_time']);
                $this->checkResponseArray($websites[$request->getUrl()], $info['http_code']);
            })
            ->setSimultaneousLimit(10)
            ->execute();
    }

    public function checkResponseArray($website_id, $http_code) {
        foreach($this->responses as $website => $responses) {
            if(count($responses) >= 2) {
                Log::info('Website ID ' . $website_id . ' has 2 responses');

                $min_response_time = round((min($responses) * 1000));
                Log::info('Website ID ' . $website_id . ' min response time: ' . $min_response_time);

                Ping::create([
                    'website_id' => $website_id,
                    'response_time' => $min_response_time,
                    'response_code' => $http_code
                ]);

                unset($this->responses[$website]);
            }
        }
    }

    public function getMedian($arr) {
        sort($arr);
        $count = count($arr);
        $middleval = floor(($count-1)/2);

        if ($count % 2) {
            $median = $arr[$middleval];
        } else {
            $low = $arr[$middleval];
            $high = $arr[$middleval+1];
            $median = (($low+$high)/2);
        }
        return $median;
    }
}
