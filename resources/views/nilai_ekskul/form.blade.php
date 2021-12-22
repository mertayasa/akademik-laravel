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
        {!! Form::label('user', 'Nama Ekstrakulikuler ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_ekskul', $ekskul, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>
{{-- <div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Nilai ', ['class' => 'mb-1']) !!}
        {!! Form::number('nilai', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div> --}}
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Keterangan ', ['class' => 'mb-1']) !!}
        {!! Form::text('keterangan',  null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>
