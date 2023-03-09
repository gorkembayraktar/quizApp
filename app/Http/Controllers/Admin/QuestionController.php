<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Str;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($quiz_id)
    {
        $quiz = Quiz::whereId($quiz_id)->with('questions')->first() ?? abort(404, 'Quiz bulunamadı');

        return view('admin.question.list' , compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionCreateRequest $request, $quiz_id)
    {
        if($request->hasFile('image')){
            $filename = Str::slug($request->question) . "." . $request->image->extension();
            $filenameWithUpload = 'uploads/'.$filename;
            $request->image->move(public_path('uploads'), $filename);
            $request->merge(['image' => $filenameWithUpload]);
        }
        Quiz::find($quiz_id)->questions()->create($request->post());

        return redirect()->route('questions.index', $quiz_id)->withSuccess('Soru Başarılı şekilde oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $quiz_id, string $question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404, 'Quiz veya soru bulunamadı');

        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request, string $quiz_id, string $question_id)
    {
        if($request->hasFile('image')){
            $filename = Str::slug($request->question) . "." . $request->image->extension();
            $filenameWithUpload = 'uploads/'.$filename;
            $request->image->move(public_path('uploads'), $filename);
            $request->merge(['image' => $filenameWithUpload]);
        }
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());

        return redirect()->route('questions.index', $quiz_id)->withSuccess('Soru Başarılı şekilde güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
