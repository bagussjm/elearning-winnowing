<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kelas extends Model
{

    protected $table='kelas';
    protected $fillable = [
        'nama_kelas','kode_kelas','kelas_created_by'

    ];

    public function getFormattedKelasCreatedDateAttribute()
    {
        if ($this->created_at){
            return Carbon::make($this->created_at)->translatedFormat('l, d F Y H:i ').' WIB';
        }
        return '';
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'kelas_created_by', 'id')
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

    public function questions()
    {
        return $this->hasMany('App\Question', 'question_kelas_id','id');
    }
}
