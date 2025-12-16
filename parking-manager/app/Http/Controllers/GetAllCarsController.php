<?php

namespace App\Http\Controllers;

class GetAllCarsController extends Controller
{
    public function __invoke()
    {
        $cars = \App\Models\Car::with('user')->get();
        return view('cars', ['cars' => $cars]);
    }
}
