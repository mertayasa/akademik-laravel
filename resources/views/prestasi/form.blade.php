<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('idTahunAjar', 'Tahun Ajar ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_tahun_ajar', ['' => 'Pilih Tahun Ajar'] + $tahun_ajar, $selected_tahun_ajar ?? null, ['class' => 'form-control', 'id' => 'idTahunAjar', 'onchange' => 'getAnggotaKelas()']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('idKelas', 'Kelas ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_kelas', ['' => 'Pilih Kelas'] + $kelas, $selected_kelas ?? null, ['class' => 'form-control', 'autocomplete' => 'off', 'id' => 'idKelas', 'onchange' => 'getAnggotaKelas()']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('idAnggotaKelas', 'Nama Siswa ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_anggota_kelas', [], null, ['class' => 'form-control', 'id' => 'idAnggotaKelas']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('idSemester', 'Semester ', ['class' => 'mb-1']) !!}
        {!! Form::select('semester', ['ganjil'=> 'Ganjil', 'genap' => 'Genap'], null, ['class' => 'form-control', 'id' => 'idSemester']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('jenisPrestasi', 'Jenis Prestasi ', ['class' => 'mb-1']) !!}
        {!! Form::text('jenis',  null, ['class' => 'form-control', 'id' => 'jenisPrestasi']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('keteranganPrestasi', 'Keterangan ', ['class' => 'mb-1']) !!}
        {!! Form::text('keterangan',  null, ['class' => 'form-control', 'id' => 'keteranganPrestasi']) !!}
    </div>
</div>

@push('scripts')
    <script>
        const idKelasEl = document.getElementById('idKelas')
        const idTahunAjarEl = document.getElementById('idTahunAjar')
        const idAnggotaKelasEl = document.getElementById('idAnggotaKelas')

        getAnggotaKelas()

        function getAnggotaKelas(){
            const idKelas = idKelasEl.value
            const idTahunAjar = idTahunAjarEl.value
            const idAnggotaKelas = document.getElementById('idAnggotaKelas')

            if(idKelas != '' && idTahunAjar != ''){
                const lastSelectedAnggota = "{{ old('id_anggota_kelas', isset($prestasi) ? $prestasi->id_anggota_kelas : null) }}"
                const getAnggotaUrl = `${baseUrl}/anggota_kelas/get-by-kelas-tahun/${idKelas}/${idTahunAjar}`
                fetch(getAnggotaUrl, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    idAnggotaKelas.length = 0
                    if(data.code == 1){
                        const anggotaKelas = data.anggota_kelas
                        for(index = 0; index < anggotaKelas.length; index++){
                            idAnggotaKelasEl.insertAdjacentHTML('beforeend', `
                                <option value="${anggotaKelas[index].id}" ${lastSelectedAnggota == anggotaKelas[index].id ? 'selected' : ''}>${anggotaKelas[index].siswa.nama}</option>
                            `)
                        }
                    }else{
                        showToast(data.code, data.message)
                    }

                })
                .catch((error) => {
                    console.log(error);
                    showToast(0, 'Gagal mengubah data mata pelajaran yang dinilai')
                })
            }else{
                idAnggotaKelas.length = 0
            }
        }

    </script>
@endpush

