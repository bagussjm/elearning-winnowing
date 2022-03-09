@extends('template.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="block-header">
                    <h2><strong>Edit {{$user->name}} ({{$user->level}})</strong></h2>
                    </h2>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">

                        <div class="row">

                                <div class="card">

                                    <div class="body">
                                        <form action="/user/{{$user->id}}/update" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                        <label for="name">Nama </label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="nama" value="{{$user->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email </label>
                                            <input name="email" type="email" class="form-control" id="email" placeholder="email" value="{{$user->email}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="level">Level </label>
                                            <select name="level" class="form-control" id="level">
                                                <option value="admin" @if($user->level == 'admin') selected @endif>Admin</option>
                                                <option value="dosen" @if($user->level == 'dosen') selected @endif>Dosen</option>
                                                <option value="mahasiwa" @if($user->level == 'mahasiswa') selected @endif>Mahasiswa</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-sm"><i class="material-icons">save</i> Update</button>

                                        </form>



                                </div>
                            </div>

                        </div>


                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
