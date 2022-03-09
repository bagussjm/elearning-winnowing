<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'questions';

    public function name_answer(){
        return $this->hasMany(Answer::class,'answer_from_user','id');
    }

    public function answer(){
        return $this->hasMany(Answer::class,'answer_from_question','id');
    }
    public function user(){
        return $this->belongsTo(\App\User::class,'question_from','id');
       // return $this->hasMany(User::class,'user_id','question_from');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'question_kelas_id','id');
    }


}
