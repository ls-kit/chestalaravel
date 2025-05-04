@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Manage Users</h1>
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="bg-white p-6 rounded shadow">
            @foreach ($users as $user)
                <div class="border-b py-4 flex justify-between items-center">
                    <div>
                        <p class="font-bold">{{ $user->name }}</p>
                        <p class="text-gray-600 text-sm">{{ $user->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('admin.users.assignRole', $user->id) }}">
                        @csrf
                        <select name="role" class="border px-8 py-2 rounded">
                            <option value="">Select a role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $user->roles->pluck('id')->first() == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">Assign</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
