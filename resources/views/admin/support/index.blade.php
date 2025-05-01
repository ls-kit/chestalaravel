@extends('layouts.app')
@section('content')
    <div class="max-w-5xl mx-auto py-2">
        <h2 class="text-xl font-bold mb-4">All User Support Messages</h2>

        @if (session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        @forelse($messages as $msg)
            <div class="border p-4 rounded mb-6 bg-white">
                <div class="mb-2 text-sm text-gray-600">
                    <strong>From:</strong> {{ $msg->user->name }} ({{ $msg->user->email }})
                </div>

                <p class="font-semibold">Subject: {{ $msg->title }}</p>

                @foreach ($msg->replies as $reply)
                    <div class="mt-2 p-2 rounded bg-gray-100">
                        <strong>{{ $reply->user->hasRole('admin') ? 'Admin' : $reply->user->name }}:</strong>
                        {{ $reply->message }}
                    </div>
                @endforeach

                <form method="POST" action="{{ route('support.reply', $msg) }}" class="mt-4 space-y-2">
                    @csrf
                    <textarea name="message" rows="2" placeholder="Reply as admin..." class="w-full border p-2 rounded"></textarea>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-1 rounded">Reply</button>
                </form>
            </div>
        @empty
            <p>No support messages yet.</p>
        @endforelse
    </div>
@endsection
