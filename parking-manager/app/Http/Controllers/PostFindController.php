<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostFindController extends Controller
{
    public function form()
    {
        return view('car-find');
    }

    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return redirect(to: "/find")
                ->withErrors($validator)
                ->withInput();
        }

        $query = $request->input('query');
        $cars = \App\Models\Car::where('plate', operator: 'LIKE', value: "%$query%")->get();

        if (empty($cars) || $cars->isEmpty()) {
            return redirect(to: "/find")
                ->withErrors(["error" => "No cars found with the given plate."])
                ->withInput();
        }

        return view('car-find', ['cars' => $cars, 'query' => $query]);
    }
}
