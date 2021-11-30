<?php

namespace App\Models;

class ApiWeather
{
    public function get($city)
    {
        $appid = 'e4a524e2296f8b6c7574168f134f74dc';
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$appid&units=metric",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $from_json_to_array = json_decode($response);

        return $from_json_to_array;

    }
}
