<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Answer;
use App\Services\Winnowing;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
{

    public function create(Request $request){

        $id_user = $request->user()->id;
        $id_question = $request->id_question;
        $hasAnswer = Answer::where('answer_from_question', $id_question)
            ->where('answer_from_user', $id_user)
            ->first();
        if ($hasAnswer){
            return redirect()->back()->with('warning', 'Anda sudah pernah menjawab pertanyaan ini');
        }

        $answerPercentage = $this->processPercentage($request);

        if ($answerPercentage !== null){
            Answer::create([
                'answer_text' => $request->answer_text,
                'answer_from_question'=> $request->id_question,
                'answer_from_user'=> $id_user,
                'answer_persentase' => $answerPercentage
            ]);

            return back()->with('success', 'Berhasil mengirimkan komentar');
        }

        return redirect()->back()->with('error', 'Ada masalah saat mengirimkan komentar');

    }

    private function processPercentage(Request $request)
    {
        try{
            $question = Question::findOrFail($request->id_question);
            $winnowingObj = new Winnowing($question->question_answer, $request->answer_text);

            $winnowingObj->SetPrimeNumber(env('WINNOWING_PRIME'));
            $winnowingObj->SetNGramValue(env('WINNOWING_N_GRAM'));
            $winnowingObj->SetNWindowValue(env('WINNOWING_WINDOW_VALUE'));

            $winnowingObj->process();

            return round($winnowingObj->GetJaccardCoefficient(), 0);

        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return null;
        }

    }

}
