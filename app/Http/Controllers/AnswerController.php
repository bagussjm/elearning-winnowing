<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Traits\Vsm;
class AnswerController extends Controller
{
	use Vsm;

    public function create(Request $request){

        $id_user = $request->user()->id;

        $case = $this->case_folding($request->answer_text);
        $token = $this->tokenizing($case);

        // $this->stemming($case);

        // for ($i=0; $i < count($token) ; $i++) {
        // 	$this->stemming($token[$i]);
        // }


        // var_dump($token[0]);exit();

        Answer::create([
            'answer_text' => $request->answer_text,
            'answer_from_question'=> $request->id_question,
            'answer_from_user'=> $id_user

        ]);

        return redirect('dashboard');
    }

}
