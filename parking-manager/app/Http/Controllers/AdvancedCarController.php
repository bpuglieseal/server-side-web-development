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
}
