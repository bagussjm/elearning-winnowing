@extends('template.layout')
@section('content')

    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif

    @php
        use Illuminate\Support\Facades\DB;
    @endphp


<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
{{--            <div class="header">--}}
{{--                <h2><strong>Kelas</strong></h2>--}}
{{--            </div>--}}

            <?php if (Auth::user()->level == 'dosen'): ?>

            <div class="body clearfix">
                <form action="{{ route('question_create') }}" method="POST">
                    {{csrf_field()}}

                    <input type="hidden" name="kelas" value="{{ $kelas->id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Pertanyaan :</b></label>
                                <textarea class="form-control" name="question_text" placeholder="Masukkan pertanyaan disini.." cols="10"></textarea>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Jawaban :</b></label>
                                <textarea class="form-control" name="question_answer" placeholder="Masukkan jawaban disini.." cols="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right"><i class="zmdi zmdi-mail-send zmdi-hc-lg"> </i> Kirim</button>
                </form>
            </div>

            <?php endif ?>

        </div>
    </div>

</div>

    <h6>List Discussion</h6>
    <?php if (count($question)==0): ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">

                    </div>
                    <div class="body clearfix p-4">
                        <span>No question now.</span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    @foreach($question as $q)

        @php
            $answer = DB::table('answers')
            ->where('answer_from_question',$q->id)
            ->get();
        @endphp
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">

                    </div>

                    <div class="body clearfix p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <tr>
                                    <td>
                                        <img src="/foto_profile/{{$q->foto}}" width="40" height="40" alt="no-image" class="rounded">
                                    </td>
                                    <td>-</td>
                                    <td> <strong>{{$q->name}}</strong></td>
                                    <td> ({{$q->nama_kelas}})</td>
                                </tr>
                                <?php if ($q->name == Auth::user()->name): ?>
                                <div class="float-right">
                                    <a href="/question/{{$q->id}}/delete" onclick="return confirm('Yakin ingein menghapus ?')" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></a>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row pl-2 pt-2">
                            <p style="font-size: 16px;">{{$q->question_text}}</p>
                        </div>
                        <br>
                        <div class="row pl-3">
                            <div class="col-md-12">
                                <span style="font-size: 11px;color:grey;" class="float-right"><strong>{{$q->created_at}}</strong> Komentar</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row pl-3">
                            <strong>Komentar :</strong>
                        </div>


                        @foreach($answer as $r)

                            <div class="row pl-3 pt-2 alert-success">
                                <div class="col-md-12">
                                    <div class="row">
                                        <?php
                                        $nama = DB::table('users')
                                            ->where('id','=',$r->answer_from_user)
                                            ->first();
                                        ?>
                                        <tr>
                                            <td><img src="/foto_profile/{{$nama->foto}}" width="20" height="20" alt="no-image" class="rounded"></td>
                                            <td>  |  <strong>{{$nama->name}}</strong> | (<strong class="text-info">{{$r->percentage}}%</strong>) </td>
                                            <td> <strong><a href="" class="text-info"></a></strong></td>
                                        </tr>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{$r->answer_text}}
                                        </div>
                                    </div>

                                    <div class="row pl-3">
                                        <div class="col-md-12">
                                            <span style="font-size: 11px;color:grey;" class="float-right"><strong>{{$r->created_at}}</strong></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>

                        @endforeach

                        <div class="row clearfix">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('answer.create') }}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id_question" value="{{$q->id}}">
                                    <textarea class="form-control" placeholder="Tulis komentar..." name="answer_text"></textarea>
                                    <button type="submit" class="btn btn-raised btn-info btn-round float-right"><i class="zmdi zmdi-mail-reply zmdi-hc-fw"></i> Balas</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
