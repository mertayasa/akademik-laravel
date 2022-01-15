<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Jadwal ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_jadwal', $jadwal, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Nama Siswa ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_anggota_kelas', $anggota_kelas, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Nilai Tugas', ['class' => 'mb-1']) !!}
        {!! Form::number('tugas', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Nilai UTS', ['class' => 'mb-1']) !!}
        {!! Form::number('uts', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Nilai UAS', ['class' => 'mb-1']) !!}
        {!! Form::number('uas', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Deskripsi Pengetahuan', ['class' => 'mb-1']) !!}
        {!! Form::text('desk_pengetahuan', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Deskripsi Keterampilan', ['class' => 'mb-1']) !!}
        {!! Form::text('desk_keterampilan', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Saran Raport', ['class' => 'mb-1']) !!}
        {!! Form::text('saran', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>

