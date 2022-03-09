@extends('template.layout')

@section('content')
            <div class="col-lg-12 col-md-12">

                    <div class="block-header">
                        <h2><strong>Profile</strong></h2>
                    </div>
                @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{session('sukses')}}
                    </div>
                @endif
                <div class="row clearfix">
                                    <div class="col-md-5">
                                        <div class="box" style="padding-top:10px; padding-bottom:500px;">

                                                <div class="col-md-12 text-center">


                                                    <img src="/foto_profile/{{(Auth::user()->foto)}}" alt="" width="50%" style="margin-top: 20px;" />

                                                </div>

                                                <div class="col-md-12 text-center">
                                                    <h6>{{Auth::user()->name}}</h6>
                                                    <h7 style="color:grey;">{{Auth::user()->level}}</h7>
                                                </div>


                                            <div class="col-md-12 text-center" style="margin-bottom:5px;">
                                                <a data-toggle="modal" data-target="#myModalphoto" class="btn btn-info" title="Ganti Foto" style="width:200px;">
                                                    <i class="material-icons">camera_alt</i> Change Photo</a>
                                            </div>

                                            <div class="card">
                                                <div class="header">
                                                    <h2><strong>Edit</strong> Profile </h2>
                                                    <h2>(Last Update {{Auth::user()->updated_at->format('d/m/Y H:i:s')}})</h2>
                                                </div>
                                                <div class="body">
                                                    <form class="form-control" method="POST" action="/profile/update">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <input type="text" name="name" id="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Username">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">Email </label>
                                                            <input name="email" type="email" class="form-control" id="email" placeholder="email" value="{{Auth::user()->email}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="level">Level </label>
                                                            <select name="level" class="form-control" id="level">
                                                                <option value="admin" @if(Auth::user()->level == 'admin') selected @endif>Admin</option>
                                                                <option value="dosen" @if(Auth::user()->level == 'dosen') selected @endif>Dosen</option>
                                                                <option value="mahasiswa" @if(Auth::user()->level == 'mahasiswa') selected @endif>Mahasiswa</option>
                                                            </select>
                                                        </div>

                                                        <button type="submit" class="btn btn-info btn-round">Save Changes</button>

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


</div>
            </div>

@endsection
