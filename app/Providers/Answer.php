<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    public function nn(){
        return $this->belongsTo(User::class,'id','answer_from_user');
    }


}
