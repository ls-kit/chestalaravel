<?php

namespace App\Http\Controllers;

use App\Models\SupportMessage;
use Illuminate\Http\Request;
class SupportController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            // Admin view
            $messages = SupportMessage::with(['user', 'replies.user'])->latest()->get();
            return view('admin.support.index', compact('messages'));
        } else {
            // User view
            $messages = auth()->user()
                ->supportMessages()
                ->with('replies.user')
                ->latest()
                ->get();
            return view('support.index', compact('messages'));
        }

    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = auth()->user()->supportMessages()->create($request->only('title', 'message'));

        $message->replies()->create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return back()->with('success', 'Message sent.');
    }
    public function reply(Request $request, SupportMessage $message)
    {
        $request->validate(['message' => 'required|string']);

        $message->replies()->create([
            'user_id' => auth()->id(), // could be user or admin
            'message' => $request->message,
        ]);

        return back()->with('success', 'Reply sent.');
    }


}
