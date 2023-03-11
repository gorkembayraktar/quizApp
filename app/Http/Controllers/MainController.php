<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;



class MainController extends Controller
{
    //
    public function dashboard(){
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }

    public function quiz(string $slug){
        $quiz = Quiz::whereSlug($slug)->with('questions')->first();

        return view('quiz', compact('quiz'));
    }
    public function quiz_detail(string $slug){
        $quiz = Quiz::whereSlug($slug)->with('my_result','top10.user')->withCount('questions')->first() ?? abort(404, 'Quiz bulunamadı!');

        return view('quiz_detail', compact('quiz'));
    }

    public function result(Request $request, string $slug){
        
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404, 'QUİZ BULUNAMADI');
        $correct = 0;

        if($quiz->my_result)
            abort(404, 'Bu quize daha önce katıldın.');

        foreach($quiz->questions as $question):
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'question_id' => $question->id,
                    'answer' => $request->post($question->id)
                ]);

    
                if($question->correct_answer === $request->post($question->id)):
                    $correct++;
                endif;

        endforeach;

        $point = round(100 / $quiz->questions()->count() * $correct);
        $wrong = count($quiz->questions) - $correct;

        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong
        ]);

        return redirect()->route('quiz.detail',$quiz->slug)->withSuccess('Quiz bitirildi, Puanın: '. $point);
    }
}
