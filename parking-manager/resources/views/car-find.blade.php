@extends('layouts.layout')
@section('title', 'Baldassare Pugliese - Find Car')
@section('content')

<form action="{{ url('/find') }}" method="post"
    class="mx-auto max-w-md space-y-4 rounded-lg border border-gray-300 bg-gray-100 p-6">
    <ul class="list-none space-y-6 my-4">
        @error("query")
        <li class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
            <span class="font-bold">Form Error!</span> {{ $message }}
        </li>
        @enderror
        @error("error")
        <li class="p-4 mb-4 text-sm text-fg-warning rounded-base bg-warning-soft" role="alert">
            <span class="font-bold">Warning!</span> {{ $message }}
        </li>
        @enderror
    </ul>
    @csrf
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="query" id="query"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " value="{{ $query ?? '' }}" />
        <label for="plate"
            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Plate</label>
    </div>
    <button type="submit"
        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full">Submit</button>
</form>

<div class="overflow-x-auto mt-6 w-9/12 mx-auto">
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Owner
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