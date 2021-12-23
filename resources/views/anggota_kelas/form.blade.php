<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Tahun Ajaran ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_tahun_ajar', $tahun_ajar, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>
{{-- <div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('kelas', 'Nama Kelas ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_kelas', $kelas, null, ['class' => 'form-control', 'id' => 'kelas']) !!}
    </div>
</div> --}}
{!! Form::hidden('id_kelas', $id_kelas , ['class' => 'form-control', 'id' => 'capitaldescription']) !!}
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Nama Siswa ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_siswa', $siswa, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>
{{-- <div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Saran Raport', ['class' => 'mb-1']) !!}
        {!! Form::text('saran', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div> --}}

@if(str_contains(Route::currentRouteName(),'edit')) 
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
        {!! Form::select('status', ['aktif' => 'Aktif', 'Nonaktif' => 'Tidak Aktif'], null, ['class' => 'form-control', 'id' => 'status']) !!}
    </div>
</div>
@endif
