@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
        <p class="mb-4 text-lg">Dynamic Role Management System</p System>
        <hr class="mb-6 border-t-2 border-gray-600 ">
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endsection
