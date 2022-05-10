<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use App\Http\Requests\StoreWeatherrequest;
use Illuminate\Http\Request;

class WeatherController extends Controller
{

    public function index()
    {
        $weather = Weather::all();

        return response($weather, 200);
    }

//    public function create()
//    {
//        //
//    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'city' => 'required',
            'temperature' => 'required',
            'humidity' => 'required',
        ]);

        $weather = Weather::create($data);

        return response($weather, 200);
    }

//    public function show(Weather $weather)
//    {
//        //
//    }
//    public function edit(Weather $weather)
//    {
//        //
//    }

    public function update(StoreWeatherrequest $request, Weather $weather) {

        $data = $request->validate([
            'city' => 'required',
            'temperature' => 'required',
            'humidity' => 'required',
        ]);

        $weather->update($data->all());

        return response($weather, 200);
    }

    public function destroy(Weather $weather) {
        $weather = Weather::find($weather);
        $weather->delete();

        return response('City deleted', 200);
    }

}
