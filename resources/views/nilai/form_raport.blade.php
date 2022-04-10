<div class="form-container mb-3">
    <h5> <b> Form Nilai Pengetahuan </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_jadwal as $mapel)
            @if ($mapel->is_lokal == false)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            {!! Form::hidden('pengetahuan['. $mapel->id .'][id_mapel]', $mapel->id, []) !!}
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 1', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][tm1_p]', $anggota_kelas->getNilaiValue('tm1_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 2', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][tm2_p]', $anggota_kelas->getNilaiValue('tm2_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 3', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][tm3_p]', $anggota_kelas->getNilaiValue('tm3_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 4', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][tm4_p]', $anggota_kelas->getNilaiValue('tm4_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'PTS', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][pts]', $anggota_kelas->getNilaiValue('pts', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'PAS', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][pas]', $anggota_kelas->getNilaiValue('pas', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 mt-2">
                                {!! Form::label('keterangan'.Str::camel($mapel->nama), 'Deskripsi', ['class' => 'mb-1']) !!}
                                {!! Form::text('pengetahuan['. $mapel->id .'][keterangan]', $anggota_kelas->getNilaiValue('desk_pengetahuan', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'keterangan'.Str::camel($mapel->nama)]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Nilai Keterampilan </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_jadwal as $mapel)
            @if ($mapel->is_lokal == false)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            {!! Form::hidden('keterampilan['. $mapel->id .'][id_mapel]', $mapel->id, []) !!}
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 1', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][tm1_k]', $anggota_kelas->getNilaiValue('tm1_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 2', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][tm2_k]', $anggota_kelas->getNilaiValue('tm2_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 3', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][tm3_k]', $anggota_kelas->getNilaiValue('tm3_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 4', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][tm4_k]', $anggota_kelas->getNilaiValue('tm4_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 mt-2">
                                {!! Form::label('keterangan'.Str::camel($mapel->nama), 'Deskripsi', ['class' => 'mb-1']) !!}
                                {!! Form::text('keterampilan['. $mapel->id .'][keterangan]', $anggota_kelas->getNilaiValue('desk_keterampilan', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'keterangan'.Str::camel($mapel->nama)]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Nilai Pengetahuan (Muatan Lokal) </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_jadwal as $mapel)
            @if ($mapel->is_lokal == true)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            {!! Form::hidden('pengetahuan['. $mapel->id .'][id_mapel]', $mapel->id, []) !!}
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 1', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][tm1_p]', $anggota_kelas->getNilaiValue('tm1_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 2', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][tm2_p]', $anggota_kelas->getNilaiValue('tm2_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 3', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][tm3_p]', $anggota_kelas->getNilaiValue('tm3_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 4', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][tm4_p]', $anggota_kelas->getNilaiValue('tm4_p', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'PTS', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][pts]', $anggota_kelas->getNilaiValue('pts', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-16-6">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'PAS', ['class' => 'mb-1']) !!}
                                {!! Form::number('pengetahuan['. $mapel->id .'][pas]', $anggota_kelas->getNilaiValue('pas', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 mt-2">
                                {!! Form::label('keterangan'.Str::camel($mapel->nama), 'Deskripsi', ['class' => 'mb-1']) !!}
                                {!! Form::text('pengetahuan['. $mapel->id .'][keterangan]', $anggota_kelas->getNilaiValue('desk_pengetahuan', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'keterangan'.Str::camel($mapel->nama)]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endif
        @endforeach
    </div>
</div>

<div class="form-container mb-3">
    <h5> <b> Form Nilai Keterampilan (Muatan Lokal) </b></h5>
    <div class="border p-2 p-md-3">
        @foreach ($mapel_of_jadwal as $mapel)
            @if ($mapel->is_lokal == true)
                <div class="row mb-3">
                    <div class="col-12 col-md-3 my-auto">
                            {{ $mapel->nama }}
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            {!! Form::hidden('keterampilan['. $mapel->id .'][id_mapel]', $mapel->id, []) !!}
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 1', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][tm1_k]', $anggota_kelas->getNilaiValue('tm1_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 2', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][tm2_k]', $anggota_kelas->getNilaiValue('tm2_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 3', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][tm3_k]', $anggota_kelas->getNilaiValue('tm3_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 col-md-3">
                                {!! Form::label('nilai'.Str::camel($mapel->nama), 'TM 4', ['class' => 'mb-1']) !!}
                                {!! Form::number('keterampilan['. $mapel->id .'][tm4_k]', $anggota_kelas->getNilaiValue('tm4_k', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'nilai'.Str::camel($mapel->nama)]) !!}
                            </div>
                            <div class="col-12 mt-2">
                                {!! Form::label('keterangan'.Str::camel($mapel->nama), 'Deskripsi', ['class' => 'mb-1']) !!}
                                {!! Form::text('keterampilan['. $mapel->id .'][keterangan]', $anggota_kelas->getNilaiValue('desk_keterampilan', $mapel->id, $semester), ['class' => 'form-control', 'id' => 'keterangan'.Str::camel($mapel->nama)]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
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
                    <div class="col-12 col-md-6">
                        {!! Form::label('namaMapel'.$eks->nama, 'Keterangan', ['class' => 'mb-1 mt-2 mt-md-0']) !!}
                        {!! Form::text('ekskul['. $eks->id .'][keterangan]', $anggota_kelas->getNilaiEkskulValue($eks->id, $semester), ['class' => 'form-control', 'id' => 'namaMapel'.$eks->nama]) !!}
                    </div>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
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
                {!! Form::label('namaMapel', 'Tinggi Badan', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::number('proporsi[tinggi]', $anggota_kelas->getNilaiProporsiValue('tinggi', $semester), ['class' => 'form-control', 'id' => 'namaMapel']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Berat Badan
            </div>
            <div class="col-12 col-md-3">
                {!! Form::label('namaMapel', 'Berat Badan', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::number('proporsi[berat]', $anggota_kelas->getNilaiProporsiValue('berat', $semester), ['class' => 'form-control', 'id' => 'namaMapel']) !!}
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
                {!! Form::label('namaMapel', 'Keterangan', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::text('kesehatan[pendengaran]', $anggota_kelas->getNilaiKesehatanValue('pendengaran', $semester), ['class' => 'form-control', 'id' => 'namaMapel']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Penglihatan
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Keterangan', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::text('kesehatan[penglihatan]', $anggota_kelas->getNilaiKesehatanValue('penglihatan', $semester), ['class' => 'form-control', 'id' => 'namaMapel']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Gigi
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Keterangan', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::text('kesehatan[gigi]', $anggota_kelas->getNilaiKesehatanValue('gigi', $semester), ['class' => 'form-control', 'id' => 'namaMapel']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Lain-Lain
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Keterangan', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::text('kesehatan[lain]', $anggota_kelas->getNilaiKesehatanValue('lain', $semester), ['class' => 'form-control', 'id' => 'namaMapel']) !!}
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
                {!! Form::label('namaMapel', 'Keterangan', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::textarea('sikap[spiritual]', $anggota_kelas->getNilaiSikapValue('spiritual', $semester), ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-3 my-auto">
                    Sikap Sosial
            </div>
            <div class="col-12 col-md-6">
                {!! Form::label('namaMapel', 'Keterangan', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::textarea('sikap[sosial]', $anggota_kelas->getNilaiSikapValue('sosial', $semester), ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
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
                {!! Form::label('namaMapel', 'Saran Untuk Siswa', ['class' => 'mb-1 d-none d-md-block']) !!}
                {!! Form::textarea('saran', $anggota_kelas->getSaranValue($semester), ['class' => 'form-control', 'id' => 'namaMapel', 'style' => 'height:70px']) !!}
            </div>
        </div>
    </div>
</div>

