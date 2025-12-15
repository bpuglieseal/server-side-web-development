@extends('layouts.layout')
@section('title', 'Cars')
@section('content')
<div class="overflow-x-auto">
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