@extends('template.layout')

@section('content')

    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>List Users</strong></h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 40px;">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($user as $usr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $usr->name }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td>{{ $usr->level }}</td>
                                    <td><img src="foto_profile/{{($usr->foto)}}" height="100"></td>

                                    <td>
                                        <a href="/user/{{$usr->id}}/edit" class="btn btn-info btn-sm"><i class="material-icons">edit</i>Edit</a>
                                        <a href="/user/{{$usr->id}}/delete" class="btn btn-danger btn-sm" data-type="confirm"><i class="material-icons">delete</i>Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
