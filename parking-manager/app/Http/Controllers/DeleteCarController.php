<?php

namespace App\Http\Controllers;
use App\Models\Car;

class DeleteCarController extends Controller
{
    public function __invoke(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect("/")->with('success', 'Car deleted successfully!');
    }
}
