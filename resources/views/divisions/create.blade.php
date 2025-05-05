@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-2">
        <h1 class="text-2xl font-bold mb-4">Create Division</h1>
        <form action="{{ route('divisions.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-2">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-gray-700 ">
            </div>
            <div class="mb-2">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                <input type="text" name="address" id="address" class="border rounded w-full py-2 px-3 text-gray-700 ">
            </div>
            <div class="mb-2">
                <label for="number" class="block text-gray-700 text-sm font-bold mb-2">Number:</label>
                <input type="number" name="number" id="number" class="border rounded w-full py-2 px-3 text-gray-700 ">
            </div>
            <div class="mb-2">
                <label for="website" class="block text-gray-700 text-sm font-bold mb-2">Website:</label>
                <input type="text" name="website" id="website" class="border rounded w-full py-2 px-3 text-gray-700 ">
            </div>
            <div class="mb-2">
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                <input type="text" name="phone" id="phone" class="border rounded w-full py-2 px-3 text-gray-700 ">
            </div>
            <div class="mb-2">
                <label for="fax" class="block text-gray-700 text-sm font-bold mb-2">Fax:</label>
                <input type="text" name="fax" id="fax" class="border rounded w-full py-2 px-3 text-gray-700 ">
            </div>
            <div class="mb-2">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3 text-gray-700 ">
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create
                Officer</button>
        </form>
    </div>
@endsection
