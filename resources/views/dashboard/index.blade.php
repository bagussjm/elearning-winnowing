@extends('template.layout')

@section('content')
@php
    use Illuminate\Support\Facades\DB;
@endphp

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">

                @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{session('sukses')}}
                    </div>
                @endif

            </div>
        </div>

    </div>
<!-- Jam Digital -->
<div class="row">
        <div class="card text-center">
            <div class="body l-parpl text-center">
                <h4><div class="text-white"><p id="greeting-content"></p></div></h4>
                <h3><div class="kotak"><p id="time-content"></p></div></h3>
                    <span class="text-white"><p id="date-content"></p></span>
            </div>
        </div>
</div>
<!-- jam digital -->

    <div class="row">
        @foreach($kelas as $item)

            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-assignment zmdi-hc-3x col-blue"></i></p>
                        <span>{{ $item->nama_kelas }}</span>
                        <p small class="text-muted">Kelas Ini Adalah Kelas Yang Mempelajari Pendidikan Kewarganegaraan.</psmall>


                        <div class="row">
                            <div class="col-12">
                                @php
                                $jumlah = DB::table('kelas_mhs')
                                            ->where('id_kelas',$item->id_kelas)
                                            ->count();
                                @endphp
                                <small>Jumlah Mahasiswa: {{ $jumlah }}</small>
                                <p><small>Dosen: {{ $item->name }} </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


  

@endsection
