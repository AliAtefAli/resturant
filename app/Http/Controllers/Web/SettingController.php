<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRateRequest;
use App\Http\Requests\SendComplaintRequest;
use App\Models\Complaint;
use App\Models\Message;
use App\Models\Question;
use App\Models\Rate;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function faq()
    {
        $faqs = Question::all();
        return view('web.settings.common_questions', compact('faqs'));
    }

    public function aboutUs()
    {
        return view('web.settings.about_us');
    }

    public function complaint()
    {
        return view('web.settings.complaints');
    }

    public function sendComplaint(SendComplaintRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = (auth()->user()->id) ?? null;
        Complaint::create($data);

        return back()->with('success', trans('site.Message Sent successfully'));
    }

    public function terms()
    {
        return view('web.settings.terms');
    }

    public function whoAreWe()
    {
        return view('web.settings.who_are_we');
    }

    public function message()
    {
        return view('web.settings.contact_us');
    }

    public function sendMessage(SendComplaintRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = (auth()->user()->id) ?? null;
        Message::create($data);

        return back()->with('success', trans('site.Message Sent successfully'));
    }

    public function rate()
    {
        return view('web.settings.rate');
    }

    public function saveRate(SaveRateRequest $request)
    {
        Rate::create([
            'amount' => $request->amount,
            'comment' => $request->comment,
            'user_id' => (auth()->user()->id) ?? 1,
        ]);

        return redirect()->route('home')->with('success', trans('site.Rate.Thank you for your Rate'));
    }
}
