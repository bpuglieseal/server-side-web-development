<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCarRequest;

class PostCarController extends Controller
{
    public function form()
    {
        return view('car-form');
    }
    public function __invoke(FormCarRequest $request)
    {
        $validated = $request->validated();
        $user = new \App\Models\User();
        $user->setAttribute('name', $request->input('name'));
        $user->setAttribute('lastname', $request->input('lastname'));
        $user->setAttribute('email', $request->input('email'));
        $user->save();

        $user->cars()->create(['plate' => $validated['plate'], 'brand' => $validated['brand'], 'model' => $validated['model']]);
        return redirect("/")->with('success', 'Car created successfully!');
    }
}
