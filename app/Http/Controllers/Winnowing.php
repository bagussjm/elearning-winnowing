<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Answer;

use App\Helpers\WinnowingHelper as WINN;
class Winnowing extends Controller
{

	public function index()
    {
    	$kalimat1 = 'aku anak indonesia';
    	$kalimat2 = 'aku anak sehat';
    	$w = new WINN($kalimat1, $kalimat2);
		$w->SetPrimeNumber(4);
		$w->SetNGramValue(5);
		$w->SetNWindowValue(2);

		return $w;
    }

}
