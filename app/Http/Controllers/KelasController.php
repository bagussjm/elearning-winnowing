<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// helper VSM
use App\Helpers\PreprocessingHelper as Preprocessing;
use App\Helpers\VSMHelper as VSM;

class KelasController extends Controller
{
    public function index()
    {
        $breadcum['breadcumb']='Kelas';
        if (Auth::user()->level== 'mahasiswa')
        {
            $data['kelas'] =
             DB::table('kelas_mhs')
                ->leftJoin('kelas','kelas.kode_kelas','=','kelas_mhs.id_kelas')
                ->where('kelas_mhs.id_mhs','=',Auth::user()->id)
                ->get();


        }
        elseif (Auth::user()->level== 'dosen')
        {
            $data['kelas'] = DB::table('kelas')
                ->where('kelas_created_by','=',Auth::user()->id)
                ->get();
        }
        else{
            $data['kelas'] = DB::table('kelas')->get();
        }

        return view('kelas/index',$data,$breadcum);

    }

    public function create(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request,[
            'nama_kelas' =>'required'

        ]);
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kode_kelas'=>$request->kode_kelas,
            'kelas_created_by'=>$id
        ]);

        // DB::table('kelas_dosen')->insert([
        //     'id_dosen' => $id,
        //     'id_kelas'=>$id
        // ]);

        return redirect('/kelas')->with('sukses','Kelas Berhasil dibuat');
    }

    public function ikuti(Request $request)
    {
        $id = Auth::user()->id;


        DB::table('kelas_mhs')->insert([
            'id_mhs' => $id,
            'id_kelas'=>$request->kode_kelas
        ]);

        return redirect('/kelas')->with('sukses','Anda Berhasil Masuk Kelas');
    }

    public function store(Request $request)
    {
//        $data['kelas'] = DB::table('kelas')->get();
        return view('kelas/view');
    }


    public function view($id)
    {
        // STEP 2 == get dokumen & parse to array
        $dokumen = DB::table('answers')->get();
        $query_dasar = [];
        foreach ($dokumen as $d) {
            $arrayDoc = [
                "id" => $d->id,
                "answer_text" => implode(" ", Preprocessing::preprocess($d->answer_text)),
            ];
            array_push($query_dasar, $arrayDoc);
        }

        // STEP 2 == get dokumen & parse to array DOSEN
        $dokumen1 = DB::table('questions')->get();
        $arrayDokumen = [];
        foreach ($dokumen1 as $d) {
            $arrayDoc1 = [
                "id_doc" => $d->id,
                "dokumen" => implode(" ", Preprocessing::preprocess($d->question_answer)),
            ];
            array_push($arrayDokumen, $arrayDoc1);
        }
        $query_dasar1 = Preprocessing::preprocess("abad");
        // STEP 3 == get rank
        $rank = VSM::get_rank($query_dasar1, $arrayDokumen);
        ($rank);


        //================================//
        $data['kelas'] = Kelas::with(['questions' => function($q){
            $q->with(['questionFrom']);
        },'createdBy'])
            ->findOrFail($id);

        $data['breadcumb']= 'Kelas/View';
        $data['question'] = $data['kelas']
            ->questions()
            ->with(['answers' => function($q){
                $q->with(['answerFromUser']);
            }])->get();

//        return response()->json($data['question']);

//        var_dump($data['question']);exit();
//        dd($data['question']);
        return view('kelas/view', $data);

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function delete($id)
    {
        $kelas = \App\Kelas::find($id);
        $kelas ->delete($kelas);

        return redirect('kelas')->with('sukses', 'Data Berhasil di Hapus');
    }


    public function delete_kelas_mhs($id_kelas_mhs)
    {
        // $kelas = \App\Kelas::find($id);
        // $kelas ->delete($kelas);


        DB::table('kelas_mhs')->where('id_kelas_mhs', $id_kelas_mhs)->delete();


        return redirect('kelas')->with('sukses', 'Data Berhasil di Hapus');
    }
}
