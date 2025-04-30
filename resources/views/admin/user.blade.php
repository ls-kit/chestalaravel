@extends('dashboard')

@section('content')
<div class="max-w-5xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Manage Users</h1>

    <div class="bg-white p-6 rounded shadow">
        @foreach($users as $user)
        <div class="border-b py-4 flex justify-between items-center">
            <div>
                <p class="font-bold">{{ $user->name }}</p>
                <p class="text-gray-600 text-sm">{{ $user->email }}</p>
            </div>
            <form method="POST" action="{{ route('admin.users.assignRole', $user->id) }}">
                @csrf
                <select name="role" class="border p-2 rounded">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <button  class="ml-2 bg-blue-500 text-white px-3 py-1 rounded">Assign</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection