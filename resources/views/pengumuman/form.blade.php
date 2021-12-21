<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Judul', ['class' => 'mb-1']) !!}
        {!! Form::text('judul', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Deskripsi', ['class' => 'mb-1']) !!}
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'id' => 'description', 'style' => 'height:150px']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Konten', ['class' => 'mb-1']) !!}
        {!! Form::textarea('konten', null, ['class' => 'form-control', 'id' => 'description', 'style' => 'height:150px']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Lampiran', ['class' => 'mb-1']) !!}
        {!! Form::text('lampiran', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>

@if(str_contains(Route::currentRouteName(),'edit')) 
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
        {!! Form::select('status', [1 => 'Aktif', 0 => 'Tidak Aktif'], null, ['class' => 'form-control', 'id' => 'status']) !!}
    </div>
</div>
@endif
