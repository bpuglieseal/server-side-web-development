<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MountainController extends Controller
{
    public function index()
    {
        $mountains = \App\Models\Mountain::orderBy('mountain_first_climb_date', 'asc')->get();
        return response()->json($mountains);
    }

    public function show(Request $request, $id)
    {
        $mountain = \App\Models\Mountain::find($id);
        if (!$mountain) {
            return response()->json(['message' => 'Mountain not found'], 404);
        } else {
            return response()->json($mountain);
        }
    }

    public function max(Request $request)
    {
        $max_mountain = \App\Models\Mountain::where([['mountain_belongs_to_range', true], ['mountain_continent', 'Europe']])->orderBy('mountain_height', 'desc')->first();
        return response()->json($max_mountain);
    }
}
