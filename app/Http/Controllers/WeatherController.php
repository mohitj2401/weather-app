<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    function index()
    {
        $coords = request()->coords ? request()->coords : "";

        $cor = str_replace(' ', '', $coords);
        if ($cor == "") {
            $cor = "20.5937,78.9629";
        }

        $client = new \GuzzleHttp\Client();
        $apiKey = config('services.openweather.key');
        try {
            $response = $client->request('GET', 'https://api.weatherapi.com/v1/forecast.json?key=' . $apiKey . '&q=' . $cor . '&days=8&aqi=no&alerts=no');
        } catch (\Throwable $th) {
            abort(500, "Check Open Weather Api Key");
        }

        $data = array();
        if ($response->getBody()) {
            $data = json_decode($response->getBody()->getContents());
        }

        return view(
            'welcome',
            [
                'current' => $data->current,
                'forecast' => $data->forecast->forecastday,
                'location' => $data->location
            ]
        );
    }
}
