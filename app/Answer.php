<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table='answers';
    protected $fillable = [
        'answer_text','answer_from_question','percentage','answer_from_user'
    ];
}
