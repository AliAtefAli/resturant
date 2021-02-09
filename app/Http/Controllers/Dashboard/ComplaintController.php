<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use App\Notifications\ReplyMessageNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::all();

        return view('dashboard.complaints.index', compact('complaints'));
    }

    public function show(Complaint $complaint)
    {
        return view('dashboard.complaints.show', compact('complaint'));
    }

    public function replyNotification(Request $request, Complaint $complaint)
    {
        $validation = \Validator::make($request->all(), [
            'answer' => 'required',
        ],[
            'answer.required' => (trans('validation.Message Required')),
        ]);
        if ($validation->fails()) {
            return back()->with('error', $validation->errors()->first());
        }
        $complaint->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send Notification
        if ($complaint->user) {
            $user = User::find($complaint->user->id);
            $user->notify(new ReplyMessageNotification($request->answer));
        }
        return back()->with('success', trans('site.Message Sent successfully'));
    }

    public function replySMS(Request $request, Complaint $complaint)
    {
        $validation = \Validator::make($request->all(), [
            'answer' => 'required',
        ],[
            'answer.required' => (trans('validation.Message Required')),
        ]);
        if ($validation->fails()) {
            return back()->with('error', $validation->errors()->first());
        }
        $complaint->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send SMS

        return back()->with('success', trans('site.Message Sent successfully'));
    }

    public function replyEmail(Request $request, Complaint $complaint)
    {
        $validation = \Validator::make($request->all(), [
            'answer' => 'required',
        ],[
            'answer.required' => (trans('validation.Message Required')),
        ]);
        if ($validation->fails()) {
            return back()->with('error', $validation->errors()->first());
        }
        $complaint->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send mail

        return back()->with('success', trans('site.Message Sent successfully'));
    }

    public function makeAsRead(Complaint $complaint)
    {
        $complaint->update(['replied_at' => Carbon::now()]);

        return back();
    }
}
