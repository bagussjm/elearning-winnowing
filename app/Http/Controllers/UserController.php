<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['breadcumb']= 'Pengguna';
        $data['user'] = DB::table('users')->get();
        return view('user/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $data['breadcumb']= 'Profile';
        $data['user'] = DB::table('users')->get();
        return view('user/profile',$data);
    }

    public function update_foto_profile(Request $request){

        if ($request->user()->foto){
            File::delete('foto_profile/'.$request->user()->foto);
        }
        $this->validate($request, [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'foto_profile';
        $file->move($tujuan_upload,$nama_file);

        $user = \App\User::find(Auth::user()->id);
        $user->update([
            'foto' => $nama_file
        ]);

        return redirect('profile')->with('sukses', 'Foto Berhasil di Update');
    }

    public function update_profile(Request $request)
    {
        $user = \App\User::find(Auth::user()->id);
        $user->update($request->all());

        return redirect('profile')->with('sukses', 'Data Berhasil di Update');
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
        return redirect('login')->with('sukses_register', 'Akun Berhasil di buat, Silahkan Login!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['breadcumb']= 'Edit';
        $user = \App\User::find($id);
        return  view('user/edit',['user'=>$user],$data);
//        dd($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = \App\User::find($id);
        $user->update($request->all());

        return redirect('user')->with('sukses', 'Data Berhasil di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $user = \App\User::find($id);
        $user->delete($user);
        return redirect('/user')->with('sukses','Data Berhasil Dihapus');
    }
}
