<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'answer_text',
        'answer_from_question',
        'percentage',
        'answer_from_user',
        'answer_persentase'
    ];

    public function getFormattedAnswerPostedDateAttribute()
    {
        if ($this->created_at) {
            return Carbon::make($this->created_at)->translatedFormat('l, d F Y  H:i') . ' WIB';
        }
        return '';
    }

    public function answerFromUser()
    {
        return $this->belongsTo('App\User', 'answer_from_user', 'id')
            ->withDefault([
                'id' => null,
                'name' => null,
                'email' => null,
                'email_verified_at' => null,
                'foto' => null,
                'password' => null,
                'level' => null,
                'remember_token' => null,
                'created_at' => null,
                'updated_at' => null,
            ]);
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'answer_from_question', 'id')
            ->withDefault([
                'id' => null,
                'question_text' => null,
                'question_answer' => null,
                'question_from' => null,
                'question_kelas_id' => null,
                'created_at' => null,
                'updated_at' => null,
            ]);
    }
}
