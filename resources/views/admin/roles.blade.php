@extends('dashboard')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Manage Roles</h1>

    <form action="{{ route('role.store') }}" method="POST" class="mb-6">
        @csrf
        <input type="text" name="name" class="border rounded p-2 w-full mb-3" placeholder="New Role Name">
        <button class="bg-green-500 text-white px-4 py-2 rounded">Add Role</button>
    </form>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-3">All Roles</h2>
        @foreach($roles as $role)
            <p class="p-2">{{ $role->name }}</p>
        @endforeach
    </div>
</div>
@endsection
