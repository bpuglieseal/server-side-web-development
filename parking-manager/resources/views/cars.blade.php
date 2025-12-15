@extends('layouts.layout')
@section('title', 'Cars')
@section('content')

<form action="{{ url('/') }}" method="post" class="mx-auto max-w-md space-y-4 rounded-lg border border-gray-300 bg-gray-100 p-6">
    <ul class="list-none space-y-6 my-4">
        @error("model")
        <li class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </li>
        @enderror
        @error("brand")
        <li class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </li>
        @enderror
        @error("plate")
        <li class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </li>
        @enderror
    </ul>
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-900" for="plate">Plate</label>
        <input name="plate" class="mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:outline-none" id="plate" type="text" placeholder="Your plate">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-900" for="brand">Brand</label>
        <input name="brand" class="mt-1 w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:outline-none" id="brand" type="text" placeholder="Your brand">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-900" for="model">Model</label>
        <textarea name="model" class="mt-1 w-full resize-none rounded-lg border-gray-300 focus:border-indigo-500 focus:outline-none" id="model" rows="4" placeholder="Your model"></textarea>
    </div>

    <button class="block w-full rounded-lg border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition-colors hover:bg-transparent hover:text-indigo-600" type="submit">
        Send Message
    </button>
</form>
<div class="overflow-x-auto mt-6">
    <table class="min-w-full divide-y-2 divide-gray-200">
        <thead class="ltr:text-left rtl:text-right">
            <tr class="*:font-medium *:text-gray-900">
                <th class="px-3 py-2 whitespace-nowrap font-extrabold">Plate</th>
                <th class="px-3 py-2 whitespace-nowrap font-extrabold">Brand</th>
                <th class="px-3 py-2 whitespace-nowrap font-extrabold">Model</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @if (isset($cars))
            @foreach ($cars as $car)
            <tr class="*:text-gray-900 *:first:font-medium">
                <td class="px-3 py-2 whitespace-nowrap">{{ $car->plate }}</td>
                <td class="px-3 py-2 whitespace-nowrap">{{ $car->brand }}</td>
                <td class="px-3 py-2 whitespace-nowrap">{{ $car->model }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection