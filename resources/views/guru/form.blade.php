<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'Nama Guru', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('announcetitle', 'NIP Guru', ['class' => 'mb-1']) !!}
        {!! Form::text('nip', null, ['class' => 'form-control number-only', 'id' => 'announcetitle']) !!}
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
        {!! Form::text('alamat', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'No Handphone', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">+62</div>
            </div>
            {!! Form::text('no_tlp', null, ['class' => 'form-control number-only', 'id' => 'description']) !!}
        </div>        
    </div>
</div>

<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('description', 'Status Guru', ['class' => 'mb-1']) !!}
        {!! Form::select('status_guru', ['tetap' => 'Tetap', 'honorer' => 'Honorer'], null, ['class' => 'form-control', 'id' => 'description']) !!}
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
        {!! Form::label('announcetitle', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'announcetitle']) !!}
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

<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('filePondUpload', 'Foto', ['class' => 'mb-1']) !!}
        {!! Form::file('foto', ['class' => 'd-block filepond', 'id' => 'filePondUpload', 'data-foto' => isset($user) && $user->foto != '' ? $user->getFoto() : '']) !!}
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
                // console.log(imageUrl);
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