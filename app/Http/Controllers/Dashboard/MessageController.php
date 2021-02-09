<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Notifications\ReplyMessageNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('dashboard.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        return view('dashboard.messages.show', compact('message'));
    }

    public function replyNotification(Request $request, Message $message)
    {
        $validation = \Validator::make($request->all(), [
            'answer' => 'required',
        ],[
            'answer.required' => (trans('validation.Message Required')),
        ]);
        if ($validation->fails()) {
            return back()->with('error', $validation->errors()->first());
        }

        $message->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send Notification
        if ($message->user) {
            $user = User::find($message->user->id);
            $user->notify(new ReplyMessageNotification($request->answer));
        }
        return back()->with('success', trans('site.Message Sent successfully'));
    }

    public function replySMS(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            'answer' => 'required',
        ],[
            'answer.required' => (trans('validation.Message Required')),
        ]);
        if ($validation->fails()) {
            return back()->with('error', $validation->errors()->first());
        }
        $message = Message::find($id);
        $message->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send SMS

        return back()->with('success', trans('site.Message Sent successfully'));
    }

    public function replyEmail(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            'answer' => 'required',
        ],[
            'answer.required' => (trans('validation.Message Required')),
        ]);
        if ($validation->fails()) {
            return back()->with('error', $validation->errors()->first());
        }
        $message = Message::find($id);
        $message->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send mail

        return back()->with('success', trans('site.Message Sent successfully'));
    }

    public function makeAsRead($id)
    {
        $message = Message::find($id);
        $message->update(['replied_at' => Carbon::now()]);

        return back();
    }

}
