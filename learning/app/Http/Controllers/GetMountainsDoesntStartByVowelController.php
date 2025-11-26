<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetMountainsDoesntStartByVowelController extends Controller
{
    public function __invoke(Request $request)
    {
        $mountains = \App\Models\Mountain::whereRaw("mountain_name REGEXP '^[^AEIOUaeiou]'")->where('mountain_belongs_to_range', false)->where('mountain_height', '>=', 1500)->get();
        return response()->json($mountains);
    }
}
