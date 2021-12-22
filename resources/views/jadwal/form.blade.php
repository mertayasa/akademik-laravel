<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Tahun Ajaran ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_tahun_ajar', $tahun_ajar, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Hari', ['class' => 'mb-1']) !!}
        {!! Form::select('hari', ['Senin' =>'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis',  'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu'], null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('kelas', 'Nama Kelas ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_kelas', $kelas, null, ['class' => 'form-control', 'id' => 'kelas']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Nama Guru ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_user', $user, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Nama Mata Pelajaran ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_mapel', $mapel, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {{-- {!! Form::label('announcetitle', 'Jam Mulai', ['class' => 'mb-1']) !!}
        {!! Form::time('jam_mulai', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!} --}}

        {!! Form::label('announcetitle', 'Jam Mulai', ['class' => 'mb-1']) !!}
        <input type="time" name="jam_mulai" class="form-control"  required value="{{$jadwal->jam_mulai}}" >

    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {{-- {!! Form::label('announcetitle', 'Jam Selesai', ['class' => 'mb-1']) !!}
        {!! Form::time('jam_selesai', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!} --}}

         {!! Form::label('announcetitle', 'Jam Selesai', ['class' => 'mb-1']) !!}
        <input type="time" name="jam_selesai" class="form-control"   required value="{{$jadwal->jam_selesai}}" >
    </div>
</div>



@if(str_contains(Route::currentRouteName(),'edit')) 
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
        {!! Form::select('status', ['aktif' => 'Aktif', 'Nonaktif' => 'Tidak Aktif'], null, ['class' => 'form-control', 'id' => 'status']) !!}
    </div>
</div>
@endif
