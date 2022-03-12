<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Question extends Model
{
    protected $table='questions';
    protected $fillable = [
        'question_text','question_answer','question_from','question_kelas_id'
    ];

    public function getFormattedQuestionDateCreateAttribute()
    {
        if ($this->created_at){
            return Carbon::make($this->created_at)->translatedFormat('l, d F Y H:i').' WIB';
        }
        return '';
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'answer_from_question', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas','question_kelas_id', 'id')
            ->withDefault([
                'id' => null,
                'nama_kelas' => null,
                'kode_kelas' => null,
                'kelas_created_by' => null,
                'created_at' => null,
                'updated_at' => null,
            ]);
    }

    public function questionFrom()
    {
        return $this->belongsTo('App\User','question_from', 'id')
            ->withDefault([
                'id' => null,
                'nama_kelas' => null,
                'kode_kelas' => null,
                'kelas_created_by' => null,
                'created_at' => null,
                'updated_at' => null,
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
}
