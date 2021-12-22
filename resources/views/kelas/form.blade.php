<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Kode Kelas', ['class' => 'mb-1']) !!}
        {!! Form::text('kode', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Jenjang Kelas', ['class' => 'mb-1']) !!}
        {!! Form::text('jenjang', null, ['class' => 'form-control', 'id' => 'description']) !!}
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
