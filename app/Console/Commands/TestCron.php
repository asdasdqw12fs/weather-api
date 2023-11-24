<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Weather;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $apikey = '8c8624a5a8305cf61fe3d8b7c911e441';
        $url = "http://api.openweathermap.org/data/2.5/weather?q=Moscow&lang=en&units=metric&appid=" . $apikey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = json_decode(curl_exec($ch));


        curl_close($ch);

        Weather::create([
            'city' => $data->name,
            'type' => $data->weather[0]->main,
            'temp' => $data->main->temp,
            'temp_min' => $data->main->temp_min,
            'temp_max' => $data->main->temp_max,
            'wind_speed' => $data->wind->speed
        ]);
    }
}
