<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Keterangan', ['class' => 'mb-1']) !!}
        {!! Form::text('keterangan', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Tahun Mulai', ['class' => 'mb-1']) !!}
        {!! Form::text('tahun_mulai', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Tahun Selesai', ['class' => 'mb-1']) !!}
        {!! Form::text('tahun_selesai', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Tanggal Mulai Semester Ganjil', ['class' => 'mb-1']) !!}
        {!! Form::date('mulai_smt_ganjil', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Tanggal Selesai Semester Ganjil', ['class' => 'mb-1']) !!}
        {!! Form::date('selesai_smt_ganjil', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Tanggal Mulai Semester Genap', ['class' => 'mb-1']) !!}
        {!! Form::date('mulai_smt_genap', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Tanggal Selesai Semester Genap', ['class' => 'mb-1']) !!}
        {!! Form::date('selesai_smt_genap', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
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
