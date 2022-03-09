<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function create(Request $request){

       $id_user = $request->user()->id;

        $this->validate($request,[
            'question_text' =>'required',
            'question_answer' =>'required',

        ]);

        Question::create([
            'question_text' => $request->question_text,
            'question_answer'=> $request->question_answer,
            'question_from'=> $id_user,
            'question_kelas_id' =>$request->kelas
        ]);

        return redirect('kelas/'.$request->kelas.'/view');
    }

    public function delete($id)
    {
        $question = \App\Question::find($id);
        $question ->delete($question);

        return redirect('kelas')->with('sukses', 'Pertanyaan Berhasil di Hapus');
    }

}
