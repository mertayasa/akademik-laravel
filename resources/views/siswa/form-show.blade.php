<div class="card-detail"> 
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
                <td>: {{$siswa->tgl_lahir}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{$siswa->jenis_kelamin}}</td>
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

    </table>
</div>