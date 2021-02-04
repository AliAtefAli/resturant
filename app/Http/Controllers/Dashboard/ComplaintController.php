<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
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
        $complaint = Complaint::find($id);
        $complaint->update([
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
        $complaint = Complaint::find($id);
        $complaint->update([
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
        $complaint = Complaint::find($id);
        $complaint->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send mail

        return back()->with('success', trans('dashboard.It was done successfully!'));
    }

    public function makeAsRead($id)
    {
        $complaint = Complaint::find($id);
        $complaint->update(['replied_at' => Carbon::now()]);

        return back();
    }
}
