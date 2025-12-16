@extends('layouts.layout')
@section('title', 'Baldassare Pugliese - Find Car')
@section('content')

<form action="{{ url('/find') }}" method="post"
    class="mx-auto max-w-md space-y-4 rounded-lg border border-gray-300 bg-gray-100 p-6">
    <ul class="list-none space-y-6 my-4">
        @error("date")
        <li class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
            <span class="font-bold">Form Error!</span> {{ $message }}
        </li>
        @enderror
        @error("user")
        <li class="p-4 mb-4 text-sm text-fg-warning rounded-base bg-warning-soft" role="alert">
            <span class="font-bold">Warning!</span> {{ $message }}
        </li>
        @enderror
    </ul>
    @csrf
    <div class="relative z-0 w-full mb-5 group">
        <label for="date" class="block mb-2.5 text-sm font-medium text-heading">First name</label>
        <input type="date" id="date" name="datetime" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="John" required />
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <label for="users" class="block mb-2.5 text-sm font-medium text-heading">Select an option</label>
        <select id="users" name="user" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
            @if (isset($users))
            <option value="">Choose a user</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            @endif
        </select>
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