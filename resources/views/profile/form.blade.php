<h6 class="text-primary text-bold">Authentikasi</h6>
{{-- <small><sup>*</sup> <i>Mohon untuk mencatat Email dan Password yang akan digunakan pada saat login</i></small><br> --}}
<div class="row mt-3 mb-5">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('Name', 'Nama', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'Name']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('Email', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'Email']) !!}
    </div>
</div>
<div class="row mt-3 mb-5">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('Password', 'Password Baru', ['class' => 'mb-1']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'Password']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('ConfirmPassword', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'ConfirmPassword']) !!}
    </div>
</div>
