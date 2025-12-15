<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostCarController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plate' => 'required|string|max:10',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $car = new \App\Models\Car();
        $car->setAttribute('plate', $validated['plate']);
        $car->setAttribute('brand', $validated['brand']);
        $car->setAttribute('model', $validated['model']);
        $car->save();

        return redirect("/")->with('success', 'Car created successfully!');
    }
}
