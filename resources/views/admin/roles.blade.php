@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-2">
        <h1 class="text-2xl font-bold mb-4">Manage Roles</h1>
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('roles.store') }}" method="POST" class="mb-6">
            @csrf
            <input type="text" name="name" class="border rounded p-2 w-full mb-3" placeholder="New Role Name">
            <button class="bg-green-500 text-white px-4 py-2 rounded">Add Role </button>
        </form>

        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold mb-3">All Roles & Permissions</h2>
            @if (session('error'))
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="bg-blue-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @php
                $sl = 1;
            @endphp
            @foreach ($roles as $role)
                <div>
                    <div class=" py-2 flex gap-2 justify-start items-center">
                        <h4 class="p-2 font-semibold">{{ $sl++ }}. {{ Str::ucfirst($role->name) }}</h4>
                        <button class="px-2 py-0 bg-blue-600 text-white rounded">Edit</button>
                    </div>


                    <div class="bg-slate-100 px-4 py-2 flex gap-2 justify-start items-center">
                        <form action="{{ route('permissions.assign', $role->id) }}" method="post">
                            @csrf
                            @foreach ($permissions as $permission)
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    @if ($role->permissions->contains($permission)) checked @endif>
                                <label class="ml-2">{{ $permission->name }}</label>
                            @endforeach
                            <button class="px-2 py-1 bg-green-600 text-white rounded" type="submit">Add
                                Permission</button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
