<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvancedCarController extends Controller
{
    public function form()
    {
        $users = \App\Models\User::all();
        return view('car-advanced', ['users' => $users]);
    }

    public function __invoke(Request $request)
    {
        $datetime = $request->input('datetime');
        $user_id = $request->input('user');

        // Find cars by datetime and user_id
        $cars = \App\Models\Car::where('user_id', $user_id)->where("created_at", "<=", $datetime)->get();

        if (empty($cars)) {
            return redirect()->back()->with("status", "warning");
        }

        return redirect()->back()->with(["status" => "ok", "message" => "Data Found", "cars" => $cars]);
    }
}
