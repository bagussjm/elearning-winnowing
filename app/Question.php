<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table='questions';
    protected $fillable = [
        'question_text','question_answer','question_from','question_kelas_id'
    ];
}
