<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('replied_at', null)
            ->paginate(10);
        return view('dashboard.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::find($id);
        return view('dashboard.messages.show', compact('message'));
    }

    public function replyNotification(Request $request, $id)
    {
        $message = Message::find($id);
        $message->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send Notification

        return back()->with('success', trans('dashboard.message.answered successfully'));
    }

    public function replySMS(Request $request, $id)
    {
        $message = Message::find($id);
        $message->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send SMS

        return back()->with('success', trans('dashboard.message.answered successfully'));
    }

    public function replyEmail(Request $request, $id)
    {
        $message = Message::find($id);
        $message->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send mail

        return back()->with('success', trans('dashboard.message.answered successfully'));
    }

    public function makeAsRead($id)
    {
        $message = Message::find($id);
        $message->update(['replied_at' => Carbon::now()]);

        return back();
    }
}
