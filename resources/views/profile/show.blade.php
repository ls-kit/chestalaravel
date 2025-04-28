@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Profile Details</h1>
        <div class="space-y-4">
            <div>
                <p class="font-bold">Name:</p>
                <p>{{ $user->name }}</p>
            </div>
            <div>
                <p class="font-bold">Email:</p>
                <p>{{ $user->email }}</p>
            </div>
            <div>
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10"
                    href="{{ route('profile.edit') }}">Update Profile</a>
            </div>
        </div>
    </div>
@endsection
