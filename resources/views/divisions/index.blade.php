@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-2">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold mb-4">All Division</h1>
            <div class="flex items-center gap-2">
                @if (request('search'))
                    <a href="{{ route('divisions.index') }}"
                        class="bg-blue-700 hover:bg-blue-800  text-white font-semibold py-1 px-2 rounded ">Clear
                    </a>
                @endif
                <form action="{{ route('divisions.index') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="border border-gray-300 rounded py-1 px-2 " placeholder="Search division...">
                    <button type="submit"
                        class="ml-2 bg-green-500 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">
                        Search
                    </button>
                </form>
            </div>

            <a href="{{ route('divisions.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded ">Create
                Division</a>
        </div>
        <table class="table-auto w-full border border-gray-300 border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Address</th>
                    <th class="border px-4 py-2">Number</th>
                    <th class="border px-4 py-2">Website</th>
                    <th class="border px-4 py-2">Phone</th>
                    <th class="border px-4 py-2">Fax</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($divisions->isEmpty())
                    <tr>
                        <td colspan="9" class="border px-4 py-2 text-center">No division found.</td>
                    </tr>
                @endif
                @foreach ($divisions as $division)
                    <tr>
                        <td class="border px-4 py-2">{{ $division->id }}</td>
                        <td class="border px-4 py-2">{{ $division->name }}</td>
                        <td class="border px-4 py-2">{{ $division->address }}</td>
                        <td class="border px-4 py-2">{{ $division->number }}</td>
                        <td class="border px-4 py-2">{{ $division->website }}</td>
                        <td class="border px-4 py-2">{{ $division->phone }}</td>
                        <td class="border px-4 py-2">{{ $division->fax }}</td>
                        <td class="border px-4 py-2">{{ $division->email }}</td>
                        <td class="border px-4 py-2 flex gap-1 justify-center">
                            <a href="{{ route('divisions.edit', $division->id) }}"
                                class="px-1 py-0 bg-green-500 rounded-sm hover:underline">Edit</a>
                            <form action="{{ route('divisions.destroy', $division->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-1 py-0 bg-red-500 rounded-sm hover:underline"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $divisions->links() }}
        </div>
    </div>
@endsection
