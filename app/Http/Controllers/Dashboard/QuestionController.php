<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFAQRequest;
use App\Http\Requests\UpdateFAQRequest;
use App\Models\Question;
use App\Models\QuestionTranslation;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $faqs = Question::all();
        return view('dashboard.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('dashboard.faq.create');
    }

    public function store(StoreFAQRequest $request)
    {
        Question::create($request->validated());

        return redirect()->route('dashboard.questions.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function show(Question $question)
    {
        return view('dashboard.faq.show', compact('question'));
    }

    public function edit(Question $question)
    {
        return view('dashboard.faq.edit', compact('question'));
    }

    public function update(UpdateFAQRequest $request, Question $question)
    {
        $question->update($request->validated());

        return redirect()->route('dashboard.questions.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function destroy(Question $question)
    {
        $question_translations = QuestionTranslation::where('question_id' ,$question->id)->get();
        if (!empty($question_translations)){
            foreach ($question_translations as $question_translation){
                $question_translation->delete();
            }
        }
        $question->delete();

        return redirect()->route('dashboard.questions.index')->with('success', trans('dashboard.It was done successfully!'));
    }
}
