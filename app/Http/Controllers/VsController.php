<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Answer;

class VsController extends Controller
{

    public function create(Request $request)
    {

        $this->proses();
    }

//deklarasi sample dokumen      $case = $this->case_folding($dokumen);
    public function dokumen()
    {
        $data = DB::table('questions')->first();
        $dokumen = array(
            $data->question_answer,
            // "uin suska riau"
        );
       // var_dump($dokumen);exit();

        return $dokumen;
    }

    //Melakukan index istilah yang ada disemua tabel/dokumen
    //TERMS (t)
    public function terms($dokumen)
    {


        //mula2 buat variabel istilah dengan data array kosong

        $istilah = array();


        foreach ($dokumen as $item) {


            $istilah_dokumen = explode(" ", strtolower($item));


            $istilah = array_merge($istilah, $istilah_dokumen);

        }


        //hapus istilah yg double

        $istilah = array_unique($istilah);




        return $istilah;

    }

    // 1. Perhitungan Term Frequency (tf)
    public function tf($terms, $dokumen)
    {

        $jml_dokumen = count($dokumen);

        $matrik_tf = array();

        //menghitung frequensi kemunculan istilah/terms di setiap dokumen


        foreach ($terms as $item) {
            for ($i = 0; $i < $jml_dokumen; $i++) {
                $jml = substr_count(strtolower($dokumen[$i]), $item);
                $matrik_tf[$item][$i] = $jml;
            }
        }



        return $matrik_tf;

    }

    // 2. Perhitungan Inverse Document Frequency (idf)
    public function idf($matrik_tf, $dokumen)
    {

        $N = count($dokumen); //jml dokumen
        $matrik_df = array();
        $matrik_idf = array();

        foreach ($matrik_tf as $key => $item) {

            //memberi nilai idf awal = 0 di setiap istilah/term
            $matrik_df[$key] = 0;

            //menghitung df di setiap istilah/term
            for ($i = 0; $i < $N; $i++) {
                if ($item[$i] > 0) {
                    $matrik_df[$key] += 1;
                }
            }
        }


        //menghitung idf di setiap istilah/term
        foreach ($matrik_df as $key => $item) {
            $matrik_idf[$key] = log10($N / $item);
        }


        return $matrik_idf;

    }

    // 3. Perhitungan Term Frequency Inverse Document Frequency (tfidf)
    public function tfidf($matrik_tf, $matrik_idf)
    {
        $matrik_tfidf = array();
        foreach ($matrik_tf as $key => $item) {
            foreach ($item as $keyItem => $itemValue) {
                $matrik_tfidf[$key][$keyItem] = $itemValue * $matrik_idf[$key];
            }
        }

        return $matrik_tfidf;
    }

    // 4. Perhitungan Jarak Dokumen ( |dj| )
    public function dj($matrik_tfidf, $dokumen)
    {
        $matrik_w = array();
        $matrik_dj = array();

        //memberi nilai tfidf awal = 0 di setiap dokumen
        $jml_dokumen = count($dokumen);
        for ($keyItem = 0; $keyItem < $jml_dokumen; $keyItem++) {
            $matrik_w[$keyItem] = 0;
        }

        //menghitung sum (w*w)
        foreach ($matrik_tfidf as $item) {
            foreach ($item as $keyItem => $itemValue) {
                $kuadrat = $itemValue * $itemValue;
                $matrik_w[$keyItem] += $kuadrat;
            }
        }

        //menghitung akar
        foreach ($matrik_w as $key => $item) {
            $matrik_dj[$key] = sqrt($item);
        }
        return $matrik_dj;
    }
    // 5. Perhitungan Query/Kata Kunci
    // 5.a menghitung pembobotan nilai Term Frequency Inverse Document Frequency  (tfidf)
    public function tfidf_query($kata_kunci, $terms, $matrik_idf)
    {
        //menghitung frequensi kemunculan istilah/terms di kata kunci
        $matrik_tf_query = array();
        $frequensi_max = 0;
        foreach ($terms as $item) {
            $jml = substr_count(strtolower($kata_kunci), $item);
            $matrik_tf_query[$item] = $jml;
            if ($jml > $frequensi_max) {
                $frequensi_max = $jml;
            }
        }
        echo "Jumlah Frequensi Maksimum = " . $frequensi_max;
        if ($frequensi_max == 0){

            $matrik_tfidf_query = null;

        }else{
            $matrik_tfidf_query = array();

            foreach ($matrik_tf_query as $key => $item) {
                $matrik_tfidf_query[$key] = ($item / $frequensi_max) * $matrik_idf[$key];
            }
        }
        //Menghitung pembobotan nilai Term Frequency Inverse Document Frequency  (tfidf)




        return $matrik_tfidf_query;
    }

    // 5.b Perhitungan Jarak Query ( |q| )
    public function q($matrik_tfidf_query)
    {
        if ($matrik_tfidf_query == null){
//            var_dump('gagal');exit();
            $q = null;
        }else{
            $w_query = 0; //memberi nilai awal = 0

            //menghitung sum (w*w)
            foreach ($matrik_tfidf_query as $item) {
                $kuadrat = $item * $item;
                $w_query += $kuadrat;
            }
            //menghitung akar
            $q = sqrt($w_query);
            return $q;
        }
    }

    //6. Perhitungan pengukuran similaritas query document
    //6.a Menghitung sum dari (tfidf * tfidf_query) atau dj.q
    public function sum_dj_q($matrik_tfidf, $matrik_tfidf_query, $dokumen)
    {
        if ($matrik_tfidf_query == null){
//            var_dump('gagal');exit();
            $matrik_sum_dj_q = null;
        }else{
            $matrik_sum_dj_q = array();

            //memberi nilai awal = 0 di setiap dokumen
            $jml_dokumen = count($dokumen);
            for ($keyItem = 0; $keyItem < $jml_dokumen; $keyItem++) {
                $matrik_sum_dj_q[$keyItem] = 0;
            }

            //menghitung sum (Wiq*Wij)
            foreach ($matrik_tfidf as $key => $item) {
                foreach ($item as $keyItem => $itemValue) {
                    $WiqXqij = $itemValue * $matrik_tfidf_query[$key];
                    $matrik_sum_dj_q[$keyItem] += $WiqXqij;
                }
            }
            return $matrik_sum_dj_q;
        }
    }

    //6.b Menghitung dari |dj|.|q| (jarak dokumen * jarak query)
    public function djq($matrik_dj, $q)
    {
        $matrik_djq = array();
        foreach ($matrik_dj as $key => $item) {
            $matrik_djq[$key] = $item * $q;
        }


        return $matrik_djq;
    }

    //6.c Menghitung dj.q / |dj|.|q|
    public function sim($matrik_sum_dj_q, $matrik_djq)
    {
        if ($matrik_sum_dj_q == null){
            $matrik_sim = null;
        }else{
            $matrik_sim = array();
            foreach ($matrik_sum_dj_q as $key => $item) {
                $matrik_sim[$key] = $item / $matrik_djq[$key];
            }


            return $matrik_sim;
        }

    }

    //menyimpulkan
    public function kesimpulan($dokumen, $matrik_sim,$kata_kunci,$id_question)
    {

        if ($matrik_sim == null){
            $persen = 0;
        }else{
            $matrik_kesimpulan = array();

            foreach ($dokumen as $key => $item) {
                $matrik_kesimpulan[$key]['data'] = $item;
                $matrik_kesimpulan[$key]['kata_kunci'] = $kata_kunci;
                $matrik_kesimpulan[$key]['similaritas'] = $matrik_sim[$key] * 100;
            }

            //mengurutkan kesimpulan
            $similaritas = array_column($matrik_kesimpulan, 'similaritas');

            array_multisort($similaritas, SORT_DESC, $matrik_kesimpulan);

            echo "<h2>KESIMPULAN SETELAH DIURUTKAN</h2>";
            echo "<pre>";
            print_r($matrik_kesimpulan);
            echo "</pre>";
            echo "<h2 style='color:green;'>SIMILARITAS KOMENTAR DAN JAWABAN = ".$matrik_kesimpulan[0]['similaritas']." </h2>";

            $persen = $matrik_kesimpulan[0]['similaritas'];

            return $persen;
        }


    }


    public function proses(Request $request)
    {

        //PERHITUNGAN DOKUMEN
        $dokumen = $this->dokumen();
        $terms = $this->terms($dokumen);
        $matrik_tf = $this->tf($terms, $dokumen);
        $matrik_idf = $this->idf($matrik_tf, $dokumen);
        $matrik_tfidf = $this->tfidf($matrik_tf, $matrik_idf);
        $matrik_dj = $this->dj($matrik_tfidf, $dokumen);

        //PERHITUNGAN QUERY/KATA KUNCI
        $kata_kunci = $request->answer_text;
        $id_question = $request->id_question;
        $matrik_tfidf_query = $this->tfidf_query($kata_kunci, $terms, $matrik_idf);
        $q = $this->q($matrik_tfidf_query);

        //PERHITUNGAN KESIMPULAN
        $matrik_sum_dj_q = $this->sum_dj_q($matrik_tfidf, $matrik_tfidf_query, $dokumen);
        $matrik_djq = $this->djq($matrik_dj, $q);
        $matrik_sim = $this->sim($matrik_sum_dj_q, $matrik_djq);
        $kesimpulan = $this->kesimpulan($dokumen, $matrik_sim,$kata_kunci,$id_question);
//
//        return $kesimpulan;
    }


}
