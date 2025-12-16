@extends('layouts.layout')
@section('title', 'Baldassare Pugliese - Cars')
@section('content')
<div class="flex flex-row justify-center">
    @if (session('success'))
    <div class="p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft" role="alert">
        <span class="font-bold">Success!</span> {{ session('success') }}
    </div>
    @endif
</div>
<div class="overflow-x-auto mt-6 w-9/12 mx-auto">
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Plate
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Brand
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Model
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (isset($cars))
                @foreach ($cars as $car)
                <x-car-row :car="$car" />
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection