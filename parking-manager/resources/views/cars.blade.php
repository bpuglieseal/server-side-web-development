@extends('layouts.layout')
@section('title', 'Cars')
@section('content')

<form action="{{ url('/') }}" method="post" class="mx-auto max-w-md space-y-4 rounded-lg border border-gray-300 bg-gray-100 p-6">
    @if (session('success'))
    <div class="p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft" role="alert">
        <span class="font-bold">Success alert!</span> {{ session('success') }}
    </div>
    @endif
    <ul class="list-none space-y-6 my-4">
        @error("model")
        <li class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
            <span class="font-bold">Form Error!</span> {{ $message }}
        </li>
        @enderror
        @error("brand")
        <li class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
            <span class="font-bold">Form Error!</span> {{ $message }}
        </li>
        @enderror
        @error("plate")
        <li class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
            <span class="font-bold">Form Error!</span> {{ $message }}
        </li>
        @enderror
    </ul>
    @csrf
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="plate" id="plate" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " />
        <label for="plate" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Plate</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="brand" id="brand" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " />
        <label for="brand" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Brand</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="model" id="model" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " />
        <label for="model" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Model</label>
    </div>
    <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full">Submit</button>
</form>
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
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $car->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $car->plate }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $car->brand }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $car->model }}
                    </td>
                    <td class="px-6 py-4">
                        <form class="flex flex-row" action="{{ url('cars/' . $car->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="inline-flex items-center justify-center gap-0.5 text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                <svg class="w-6 h-6 text-inherit dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>


</div>
@endsection