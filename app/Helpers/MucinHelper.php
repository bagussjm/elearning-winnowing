<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

/**
 * Kelas Helper untuk Preprocess
 */
class MucinHelper
{

    
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


} // end class
