<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Nama Guru', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'NIP Guru', ['class' => 'mb-1']) !!}
        {!! Form::number('nip', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Tempat Lahir', ['class' => 'mb-1']) !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Tanggal Lahir', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_lahir', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Alamat', ['class' => 'mb-1']) !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'description', 'style' => 'height:150px']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'No Handphone', ['class' => 'mb-1']) !!}
        {!! Form::number('no_tlp', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Pekerjaan', ['class' => 'mb-1']) !!}
        {!! Form::text('pekerjaan', null, ['class' => 'form-control', 'id' => 'description',]) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Status Guru', ['class' => 'mb-1']) !!}
        {!! Form::select('status_guru', ['tetap' => 'Tetap', 'honorer' => 'Honorer'], null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Jenis Kelamin', ['class' => 'mb-1']) !!}
        {!! Form::select('jenis_kelamin', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>


<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('doctorPassword', 'Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password',  ['class' => 'form-control', 'id' => 'doctorPassword']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('doctorConfirmPassword', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password_confirmation',  ['class' => 'form-control', 'id' => 'doctorConfirmPassword']) !!}
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
