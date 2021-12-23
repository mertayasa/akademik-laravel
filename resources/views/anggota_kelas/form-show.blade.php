<div class="card-detail"> 
    <table class="table table-borderless">
            <tr>
                <td style="width: 150px">Nama Siswa</td>
                <td>: {{$anggota_kelas->siswa->nama}}</td>
            </tr>
            <tr>
                <td>NIS Siswa</td>
                <td>: {{$anggota_kelas->siswa->nis}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{$anggota_kelas->siswa->alamat}}</td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>: {{$anggota_kelas->siswa->tempat_lahir}}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: {{indonesianDate($anggota_kelas->siswa->tgl_lahir)}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{$anggota_kelas->siswa->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{$anggota_kelas->siswa->email}}</td>
            </tr>
            <tr>
                <td>Nama Orang Tua</td>
                <td>: {{$anggota_kelas->siswa->user->nama}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: {{$anggota_kelas->siswa->status}}</td>
            </tr>

    </table>
</div>