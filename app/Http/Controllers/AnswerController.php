<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Services\Winnowing;

class AnswerController extends Controller
{

	private $winnowingService;

	public function __construct()
    {
        $this->winnowingService = new Winnowing('kambing','kalimat 2');
    }

    public function create(Request $request){

        $id_user = $request->user()->id;
        $id_question = $request->id_question;
        $hasAnswer = Answer::where('answer_from_question', $id_question)
            ->where('answer_from_user', $id_user)
            ->first();
        if ($hasAnswer){
            return redirect()->back()->with('warning', 'Anda sudah pernah menjawab pertanyaan ini');
        }

        Answer::create([
            'answer_text' => $request->answer_text,
            'answer_from_question'=> $request->id_question,
            'answer_from_user'=> $id_user

        ]);

        return redirect('dashboard');
    }

}
