<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Semester ', ['class' => 'mb-1']) !!}
        {!! Form::select('semester', ['ganjil'=> 'Ganjil', 'genap' => 'Genap'], null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('kelas', 'Nama Siswa ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_anggota_kelas', $anggota_kelas, null, ['class' => 'form-control', 'id' => 'kelas']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Jenis Kesehatan ', ['class' => 'mb-1']) !!}
        {!! Form::select('jenis_kesehatan', ['pendengaran'=> 'pendengaran', 'penglihatan' => 'penglihatan', 'gigi' => 'gigi', 'lainnya' => 'lainnya'], null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Keterangan ', ['class' => 'mb-1']) !!}
        {!! Form::text('keterangan',  null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>

