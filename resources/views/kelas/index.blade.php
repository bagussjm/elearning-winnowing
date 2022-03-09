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
                        <h2><strong>List Kelas</strong></h2>
                    </div>
                    <div class="body">
                        <?php if (Auth::user()->level == 'dosen'): ?>
                        <a href="#defaultModal" class="btn btn-primary" data-toggle="modal" data-target="#defaultModal">Buat Kelas</a>
                        <?php endif?>

                       <?php if (Auth::user()->level == 'mahasiswa'): ?>
                        <a href="#defaultModal"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalIkutKelas"><i class="material-icons">forward</i> Ikuti Kelas</a>
                        <?php endif?>

                        <hr>
                         <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 40px;">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Kode Kelas</th>

                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach( $kelas as $kls )
                                    <tr>
                                        <td class="align-center">{{ $loop->iteration }}</td>
                                        <td class="align-center">{{ $kls->nama_kelas }}</td>
                                        <td class="align-center">{{ $kls->kode_kelas }}</td>
                                        <td class="align-center">
                                            <a href="{{ route('kelas_view',$kls->id) }}" class="btn btn-info btn-sm" ><i class="material-icons">input</i> Masuk</a>
                                            <?php if (Auth::user()->level == 'admin'): ?>
                                                <a href="{{ route('kelas.delete',$kls->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus ?')"><i class="material-icons">delete</i> Delete</a>
                                            <?php endif?>
                                            <?php if (Auth::user()->level == 'dosen'): ?>
                                                <a href="{{ route('kelas.delete',$kls->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus ?')"><i class="material-icons">delete</i> Hapus</a>
                                            <?php endif?>

                                            <?php if (Auth::user()->level == 'mahasiswa'): ?>
                                                <a href="{{ route('kelas.delete-kelas-mhs', $kls->id_kelas_mhs) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus ?')"><i class="material-icons">reply</i> Keluar</a>
                                            <?php endif?>

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
