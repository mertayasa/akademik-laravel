<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Nama Siswa', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'NIS Siswa', ['class' => 'mb-1']) !!}
        {!! Form::number('nis', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
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
        {!! Form::label('description', 'Jenis Kelamin', ['class' => 'mb-1']) !!}
        {!! Form::select('jenis_kelamin', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('user', 'Orang Tua ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_user', $user, null, ['class' => 'form-control', 'id' => 'user']) !!}
    </div>
</div>

@if (str_contains(Route::currentRouteName(), 'edit'))
    <div class="row mt-3">
        <div class="col-12  pb-3 pb-md-0">
            {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
            {!! Form::select('status', ['Aktif' => 'Aktif', 'Nonaktif' => 'Tidak Aktif'], null, ['class' => 'form-control', 'id' => 'status']) !!}
        </div>
    </div>
@endif

<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('filePondUpload', 'Foto', ['class' => 'mb-1']) !!}
        {!! Form::file('foto', ['class' => 'd-block filepond', 'id' => 'filePondUpload', 'data-foto' => isset($siswa) && $siswa->foto != '' ? $siswa->getFoto() : '']) !!}
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(
                FilePondPluginFileEncode,
                FilePondPluginFileValidateSize,
                FilePondPluginFileValidateType,
                FilePondPluginImageExifOrientation,
                FilePondPluginImagePreview
            )

            let options = {
                acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
                maxFileSize: '2MB'
            }

            let imageUrl

            const url = window.location
            if (url.pathname.includes('edit')) {
                imageUrl = document.getElementById('filePondUpload').getAttribute('data-foto')
                console.log(imageUrl);
                if(!isNull(imageUrl)){
                    options = {
                        acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
                        maxFileSize: '2MB',
                        files: [{
                            source: imageUrl,
                            options: {
                                type: 'remote'
                            }
                        }],
                    }
                }
            }

            FilePond.create(
                document.getElementById('filePondUpload'), options
            )
        })
    </script>
@endpush
