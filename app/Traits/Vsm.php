<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait Vsm {
	public static function case_folding($query){
        $result = strtolower($query);
        return $result;
    }

    public static function tokenizing($query)
    {
        // Removes special chars.
        $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', $query);
        // Replaces multiple spasi with single spasi.
        $string = preg_replace('!\s+!', ' ', $string);
        // String to array
        $string_array = explode(" ", $string);

        return $string_array;
    }

    public static function stemming($query)
    {
        // $cari  = $this->cari("lihat");
        $query_array = [];
        foreach ($query as $key => $value) {
            array_push($query_array, $this->katadasar($value));
        }
        return $query_array;
    }


    // ========== fungsi pendukung Preprocessing ========= //
    function cari($kata){
        $hasil = DB::table('tb_katadasar')->where('katadasar', $kata)->first();
        return $hasil ? $hasil->katadasar : NULL;
    }

    //langkah 1 - hapus partikel
    function hapuspartikel($kata){
        if($this->cari($kata)==NULL){
            if((substr($kata, -3) == 'kah' ) || ( substr($kata, -3) == 'lah' ) || ( substr($kata, -3) == 'pun' )) {
                $kata = substr($kata, 0, -3);
            }
        }
        return $kata;
    }

    //langkah 2 - hapus possesive pronoun
    function hapuspp($kata){
        if($this->cari($kata)==NULL){
            if(strlen($kata) > 4){
                if((substr($kata, -2)== 'ku')||(substr($kata, -2)== 'mu')){
                    $kata = substr($kata, 0, -2);
                }else if((substr($kata, -3)== 'nya')){
                    $kata = substr($kata,0, -3);
                }
            }
        }
        return $kata;
    }

    //langkah 3 hapus first order prefiks (awalan pertama)
    function hapusawalan1($kata){
        if($this->cari($kata)==NULL){
            if(substr($kata,0,4)=="meng"){
                if(substr($kata,4,1)=="e"||substr($kata,4,1)=="u"){
                    $kata = "k".substr($kata,4);
                }else{
                    $kata = substr($kata,4);
                }
            }else if(substr($kata,0,4)=="meny"){
                $kata = "s".substr($kata,4);
            }else if(substr($kata,0,3)=="men"){
                $kata = substr($kata,3);
            }else if(substr($kata,0,3)=="mem"){
                if(substr($kata,3,1)=="a" || substr($kata,3,1)=="i" || substr($kata,3,1)=="e" || substr($kata,3,1)=="u" || substr($kata,3,1)=="o"){
                    $kata = "p".substr($kata,3);
                }else{
                    $kata = substr($kata,3);
                }
            }else if(substr($kata,0,2)=="me"){
                $kata = substr($kata,2);
            }else if(substr($kata,0,4)=="peng"){
                if(substr($kata,4,1)=="e" || substr($kata,4,1)=="a"){
                    $kata = "k".substr($kata,4);
                }else{
                    $kata = substr($kata,4);
                }
            }else if(substr($kata,0,4)=="peny"){
                $kata = "s".substr($kata,4);
            }else if(substr($kata,0,3)=="pen"){
                if(substr($kata,3,1)=="a" || substr($kata,3,1)=="i" || substr($kata,3,1)=="e" || substr($kata,3,1)=="u" || substr($kata,3,1)=="o"){
                    $kata = "t".substr($kata,3);
                }else{
                    $kata = substr($kata,3);
                }
            }else if(substr($kata,0,3)=="pem"){
                if(substr($kata,3,1)=="a" || substr($kata,3,1)=="i" || substr($kata,3,1)=="e" || substr($kata,3,1)=="u" || substr($kata,3,1)=="o"){
                    $kata = "p".substr($kata,3);
                }else{
                    $kata = substr($kata,3);
                }
            }else if(substr($kata,0,2)=="di"){
                $kata = substr($kata,2);
            }else if(substr($kata,0,3)=="ter"){
                $kata = substr($kata,3);
            }else if(substr($kata,0,2)=="ke"){
                $kata = substr($kata,2);
            }
        }
        return $kata;
    }

    //langkah 4 hapus second order prefiks (awalan kedua)
    function hapusawalan2($kata){
        if($this->cari($kata)==NULL){
            if(substr($kata,0,3)=="ber"){
                $kata = substr($kata,3);
            }else if(substr($kata,0,3)=="bel"){
                $kata = substr($kata,3);
            }else if(substr($kata,0,2)=="be"){
                $kata = substr($kata,2);
            }else
            if(substr($kata,0,3)=="per" && strlen($kata) > 5){
                $kata = substr($kata,3);
            }else if(substr($kata,0,2)=="pe"  && strlen($kata) > 5){
                $kata = substr($kata,2);
            }else if(substr($kata,0,3)=="pel"  && strlen($kata) > 5){
                $kata = substr($kata,3);
            }else if(substr($kata,0,2)=="se"  && strlen($kata) > 5){
                $kata = substr($kata,2);
            }
        }
        return $kata;
    }

    ////langkah 5 hapus suffiks
    function hapusakhiran($kata){
        if($this->cari($kata)==NULL){
            if (substr($kata, -3)== "kan" ){
                $kata = substr($kata, 0, -3);
            }
            else if(substr($kata, -1) == "i"  && $kata != 'beri'){
                $kata = substr($kata, 0, -1);
            }else if(substr($kata, -2)== "an"){
                $kata = substr($kata, 0, -2);
            }
        }
        return $kata;
    }

    function katadasar($kata)
    {
        return $this->hapusakhiran( $this->hapusawalan2($this->hapusawalan1($this->hapuspp($this->hapuspartikel($kata)))) );
    }
}