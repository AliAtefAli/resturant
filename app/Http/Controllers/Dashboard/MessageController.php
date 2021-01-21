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

    public function show(Message $message)
    {
        return view('dashboard.messages.show', compact('message'));
    }

    public function replyNotification(Request $request, $id)
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
        // Send Notification

        return back()->with('success', trans('dashboard.It was done successfully!'));
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

        return back()->with('success', trans('dashboard.It was done successfully!'));
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

        return back()->with('success', trans('dashboard.It was done successfully!'));
    }

    public function makeAsRead($id)
    {
        $message = Message::find($id);
        $message->update(['replied_at' => Carbon::now()]);

        return back();
    }

}
