<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('name', 'Nama Orang Tua', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('namaIbu', 'Nama Ibu', ['class' => 'mb-1']) !!}
        {!! Form::text('nama_ibu', null, ['class' => 'form-control', 'id' => 'namaIbu']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('tempatLahir', 'Tempat Lahir', ['class' => 'mb-1']) !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempatLahir']) !!}
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
        {!! Form::label('alamat', 'Alamat', ['class' => 'mb-1']) !!}
        {!! Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('no_telp', 'No Handphone', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">+62</div>
            </div>
            {!! Form::text('no_tlp', null, ['class' => 'form-control number-only', 'id' => 'no_telp']) !!}
        </div>     
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Pekerjaan', ['class' => 'mb-1']) !!}
        {!! Form::text('pekerjaan', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('pekerjaanIbu', 'Pekerjaan Ibu', ['class' => 'mb-1']) !!}
        {!! Form::text('pekerjaan_ibu', null, ['class' => 'form-control', 'id' => 'pekerjaanIbu']) !!}
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
        {!! Form::label('email', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('password', 'Password', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
            <div class="input-group-prepend" style="cursor: pointer" onclick="showPassword('password')">
              <div class="input-group-text py-2"><i class="fas fa-eye"></i></div>
            </div>
        </div>  
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('confirmPassword', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'confirmPassword']) !!}
            <div class="input-group-prepend" style="cursor: pointer" onclick="showPassword('confirmPassword')">
              <div class="input-group-text py-2"><i class="fas fa-eye"></i></div>
            </div>
        </div>  
    </div>
</div>


@if (str_contains(Route::currentRouteName(), 'edit'))
    <div class="row mt-3">
        <div class="col-12  pb-3 pb-md-0">
            {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
            {!! Form::select('status', ['aktif' => 'Aktif', 'Nonaktif' => 'Tidak Aktif'], null, ['class' => 'form-control', 'id' => 'status']) !!}
        </div>
    </div>
@endif
