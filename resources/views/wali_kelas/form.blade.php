<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('kelas', 'Nama Kelas ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_kelas', $kelas, null, ['class' => 'form-control', 'id' => 'kelas']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Tahun Ajaran ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_tahun_ajar', $tahun_ajar, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Nama Guru ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_user', $user, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>