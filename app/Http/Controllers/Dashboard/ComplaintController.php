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
        $complaints = Complaint::where('replied_at', null)
            ->latest()
            ->paginate(10);

        return view('dashboard.complaints.index', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::find($id);

        return view('dashboard.complaints.show', compact('complaint'));
    }

    public function replyNotification(Request $request, $id)
    {
        $complaint = Complaint::find($id);
        $complaint->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send Notification

        return back()->with('success', trans('dashboard.complaint.answered successfully'));
    }

    public function replySMS(Request $request, $id)
    {
        // dd($request->all(), $id);
        $complaint = Complaint::find($id);
        $complaint->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send SMS

        return back()->with('success', trans('dashboard.complaint.answered successfully'));
    }

    public function replyEmail(Request $request, $id)
    {
        $complaint = Complaint::find($id);
        $complaint->update([
            'answer' => $request->answer,
            'replied_at' => Carbon::now()
        ]);
        // Send mail

        return back()->with('success', trans('dashboard.complaint.answered successfully'));
    }

    public function makeAsRead($id)
    {
        $complaint = Complaint::find($id);
        $complaint->update(['replied_at' => Carbon::now()]);

        return back();
    }
}
