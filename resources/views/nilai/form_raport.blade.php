<div class="form-container mb-3">
    <h5> <b> Form Nilai Pengetahuan </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_nilai as $mapel)
            @if ($mapel->is_lokal == false)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-3">
                        {!! Form::label('namaMapel'.$mapel->nama, 'Nilai Pengetahuan', ['class' => 'mb-1']) !!}
                        {!! Form::number('pengetahuan['. $mapel->id .'][nilai]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$mapel->nama]) !!}
                    </div>
                    <div class="col-12 col-md-6">
                        {!! Form::label('namaMapel'.$mapel->nama, 'Deskripsi Pengetahuan', ['class' => 'mb-1']) !!}
                        {!! Form::text('pengetahuan['. $mapel->id .'][keterangan]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$mapel->nama]) !!}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Nilai Keterampilan </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_nilai as $mapel)
            @if ($mapel->is_lokal == false)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-3">
                        {!! Form::label('namaMapel'.$mapel->nama, 'Nilai Keterampilan', ['class' => 'mb-1']) !!}
                        {!! Form::number('keterampilan['. $mapel->id .'][nilai]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$mapel->nama]) !!}
                    </div>
                    <div class="col-12 col-md-6">
                        {!! Form::label('namaMapel'.$mapel->nama, 'Deskripsi Keterampilan', ['class' => 'mb-1']) !!}
                        {!! Form::text('keterampilan['. $mapel->id .'][keterangan]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$mapel->nama]) !!}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Nilai Pengetahuan (Muatan Lokal) </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_nilai as $mapel)
            @if ($mapel->is_lokal == true)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-3">
                        {!! Form::label('namaMapel'.$mapel->nama, 'Nilai Pengetahuan (Muatan Lokal)', ['class' => 'mb-1']) !!}
                        {!! Form::number('pengetahuan['. $mapel->id .'][nilai]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$mapel->nama]) !!}
                    </div>
                    <div class="col-12 col-md-6">
                        {!! Form::label('namaMapel'.$mapel->nama, 'Deskripsi Pengetahuan (Muatan Lokal)', ['class' => 'mb-1']) !!}
                        {!! Form::text('pengetahuan['. $mapel->id .'][keterangan]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$mapel->nama]) !!}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Nilai Keterampilan (Muatan Lokal) </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_nilai as $mapel)
            @if ($mapel->is_lokal == true)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-3">
                        {!! Form::label('namaMapel'.$mapel->nama, 'Nilai Keterampilan (Muatan Lokal)', ['class' => 'mb-1']) !!}
                        {!! Form::number('keterampilan['. $mapel->id .'][nilai]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$mapel->nama]) !!}
                    </div>
                    <div class="col-12 col-md-6">
                        {!! Form::label('namaMapel'.$mapel->nama, 'Deskripsi Keterampilan (Muatan Lokal)', ['class' => 'mb-1']) !!}
                        {!! Form::text('keterampilan['. $mapel->id .'][keterangan]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$mapel->nama]) !!}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Nilai Ekskul </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($ekskul as $eks)
            @if ($eks->status == 'aktif')
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $eks->nama }}
                    </div>
                    <div class="col-12 col-md-3">
                        {!! Form::label('namaMapel'.$eks->nama, 'Nilai Ekskul', ['class' => 'mb-1']) !!}
                        {!! Form::number('ekskul['. $eks->id .'][nilai]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$eks->nama]) !!}
                    </div>
                    <div class="col-12 col-md-6">
                        {!! Form::label('namaMapel'.$eks->nama, 'Deskripsi Ekskul', ['class' => 'mb-1']) !!}
                        {!! Form::text('ekskul['. $eks->id .'][keterangan]', null, ['class' => 'form-control', 'id' => 'namaMapel'.$eks->nama]) !!}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Tinggi dan Berat Badan </b></h5>
    <div class="border p-2 p-md-3">
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Tinggi Badan
            </div>
            <div class="col-12 col-md-3">
                {!! Form::label('namaMapel', 'Tinggi Badan', ['class' => 'mb-1']) !!}
                {!! Form::number('proporsi[tinggi]', null, ['class' => 'form-control', 'id' => 'namaMapel']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Berat Badan
            </div>
            <div class="col-12 col-md-3">
                {!! Form::label('namaMapel', 'Berat Badan', ['class' => 'mb-1']) !!}
                {!! Form::number('proposi[berat]', null, ['class' => 'form-control', 'id' => 'namaMapel']) !!}
            </div>
        </div>
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Kondisi Kesehatan </b></h5>
    <div class="border p-2 p-md-3">
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Pendengaran
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Pendengaran', ['class' => 'mb-1']) !!}
                {!! Form::text('kesehatan[pendengaran]', null, ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Penglihatan
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Penglihatan', ['class' => 'mb-1']) !!}
                {!! Form::text('kesehatan[penglihatan]', null, ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Gigi
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Gigi', ['class' => 'mb-1']) !!}
                {!! Form::text('kesehatan[gigi]', null, ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Lain-Lain
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Lain-Lain', ['class' => 'mb-1']) !!}
                {!! Form::text('kesehatan[lain]', null, ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Sikap </b></h5>
    <div class="border p-2 p-md-3">
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Sikap Spiritual
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Sikap Spriritual', ['class' => 'mb-1']) !!}
                {!! Form::textarea('sikap[spiritual]', null, ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Sikap Sosial
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Sikap Sosial', ['class' => 'mb-1']) !!}
                {!! Form::textarea('sikap[sosial]', null, ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Saran </b></h5>
    <div class="border p-2 p-md-3">
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Saran untuk siswa
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Saran Untuk Siswa', ['class' => 'mb-1']) !!}
                {!! Form::textarea('saran', null, ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
    </div>
</div>