<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['breadcumb']='Dashboard';
        $data['kelas']=DB::table('kelas_mhs')
        				->where('id_mhs',Auth::user()->id)
        				->leftJoin('kelas','kelas.kode_kelas','=','kelas_mhs.id_kelas')
        				->leftJoin('users','users.id','=','kelas.kelas_created_by')
        				->get();

        $question = \App\Dashboard::all();
        $name = \App\Answer::all();
        return view('dashboard.index',compact('question','name'),$data);
    }
}
