@extends('layouts.app')
@section('content')
    <div class="max-w-3xl mx-auto py-6">
        <h2 class="text-xl font-bold mb-4">Your Support Messages</h2>

        @if (session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('support.store') }}" class="space-y-4 mb-6">
            @csrf
            <input type="text" name="title" placeholder="Subject" class="w-full p-2 border rounded" required>

            <textarea name="message" rows="4" placeholder="Your message" class="w-full p-2 border rounded" required></textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send Message</button>
        </form>

        @forelse($messages as $msg)
            <div class="border py-2 rounded mb-6">
                <p class="font-semibold">Subject: {{ $msg->title }}</p>

                @foreach ($msg->replies as $reply)
                    <div class="mt-2 p-2 rounded bg-gray-100">
                        <strong>{{ $reply->user->hasRole('admin') ? 'Admin' : 'You' }}:</strong>
                        {{ $reply->message }}
                    </div>
                @endforeach

                <form method="POST" action="{{ route('support.reply', $msg) }}" class="mt-4 space-y-2">
                    @csrf
                    <textarea name="message" rows="2" placeholder="Reply..." class="w-full border p-2 rounded"></textarea>
                    <button type="submit" class="bg-green-600 text-white px-4 py-1 rounded">Reply</button>
                </form>
            </div>
        @empty
            <p>No support messages yet.</p>
        @endforelse
    </div>
@endsection
