<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\WeatherResource;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function get(Request $request) {
        $data = Weather::orderBy('created_at', 'desc')->get();

        return response()->json(WeatherResource::collection($data));
    }
}
