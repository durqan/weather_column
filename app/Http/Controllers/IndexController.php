<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiWeather;

class IndexController extends Controller
{
    public function index()
    {
        $cities = ['Киев', 'Москва', 'Самара'];

        if (!is_array($cities)) {
            $cities = array($cities);
        }


        $weather = new ApiWeather();
        $result = [];

        foreach ($cities as $city) {
            $collection = $weather->get($city);
            $city_weather = [];
            $city_weather['City'] = $collection->name;
            $city_weather['Temperature'] = $collection->main->temp;
            foreach ($collection->weather as $val) {
                $city_weather['Description_Weather'] = $val->description;
            }

            $result[$city] = $city_weather;
        }

        return view('index', ['weather' => $result]);
    }
}
