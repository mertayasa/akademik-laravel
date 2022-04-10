<div class="card-detail">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="profile-pic">
                <img src="{{ $siswa->getFoto() }}" width="100%" height="200px" style="object-fit: contain" alt="">
            </div>
        </div>
        <div class="col-12 col-md-8">
            <table class="table table-borderless">
                    <tr>
                        <td style="width: 150px">Nama Siswa</td>
                        <td>: {{$siswa->nama}}</td>
                    </tr>
                    <tr>
                        <td>NIS Siswa</td>
                        <td>: {{$siswa->nis}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{$siswa->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>: {{$siswa->tempat_lahir}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: {{indonesianDate($siswa->tgl_lahir)}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{$siswa->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{$siswa->agama}}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>: {{$siswa->agama}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: {{$siswa->email}}</td>
                    </tr>
                    <tr>
                        <td>Nama Orang Tua</td>
                        <td>: {{$siswa->user->nama}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{$siswa->status}}</td>
                    </tr>
                    <tr>
                        <td>Sikap Sosial</td>
                        <td>: {{$siswa->sikap_sosial ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td>Sikap Spiritual</td>
                        <td>: {{$siswa->sikap_spiritual ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td>Saran</td>
                        <td>: {{$siswa->saran ?? '-'}}</td>
                    </tr>
        
            </table>
        </div>
    </div>
</div>