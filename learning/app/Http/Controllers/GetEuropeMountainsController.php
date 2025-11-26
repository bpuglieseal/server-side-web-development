<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetEuropeMountainsController extends Controller
{
    public function __invoke(Request $request)
    {
        $mountains = \App\Models\Mountain::where([['mountain_continent', '=', 'Europe'], ['mountain_belongs_to_range', '=', 1],])->whereYear('mountain_first_climb_date', '>=', 1985)->get();
        return response()->json($mountains);
    }
}
