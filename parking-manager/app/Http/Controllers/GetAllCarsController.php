<?php

namespace App\Http\Controllers;

class GetAllCarsController extends Controller
{
    public function __invoke()
    {
        $cars = \App\Models\Car::all();
        return view('cars', ['cars' => $cars]);
    }
}
