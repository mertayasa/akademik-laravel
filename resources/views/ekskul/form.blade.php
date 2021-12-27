<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('ekskul', 'Nama Ekstrakulikuler', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'ekskul']) !!}
    </div>
</div>

@if(str_contains(Route::currentRouteName(),'edit')) 
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
        {!! Form::select('status', ['aktif' => 'Aktif', 'nonaktif' => 'Tidak Aktif'], isset($ekskul) ? $ekskul->status : null, ['class' => 'form-control', 'id' => 'status']) !!}
    </div>
</div>
@endif