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
        {!! Form::label('filePondUpload', 'Lampiran', ['class' => 'mb-1']) !!}
        {!! Form::file('lampiran', ['class' => 'd-block filepond', 'id' => 'filePondUpload', 'data-lampiran' => isset($pengumuman) && $pengumuman->lampiran != '' ? $pengumuman->getLampiran() : '']) !!}
        <span> <i>Lampiran harus berupa file pdf</i> </span>
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
                acceptedFileTypes: ['application/pdf'],
                maxFileSize: '5MB'
            }

            let imageUrl

            const url = window.location
            if (url.pathname.includes('edit')) {
                imageUrl = document.getElementById('filePondUpload').getAttribute('data-lampiran')
                console.log(imageUrl);
                if(!isNull(imageUrl)){
                    options = {
                        acceptedFileTypes: ['application/pdf'],
                        maxFileSize: '5MB',
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

