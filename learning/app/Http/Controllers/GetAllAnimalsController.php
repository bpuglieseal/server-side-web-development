<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class GetAllAnimalsController extends Controller
{
    public function __invoke(Request $request)
    {
        $animals = Animal::all();
        return response()->json($animals);
    }
}
