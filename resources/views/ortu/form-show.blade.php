<div class="card-detail"> 
    <table class="table table-borderless">
            <tr>
                <td style="width: 150px">Nama Ayah</td>
                <td>: {{$user->nama}}</td>
            </tr>
            <tr>
                <td style="width: 150px">Nama Ibu</td>
                <td>: {{$user->nama_ibu}}</td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td>: {{$user->no_tlp}}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{$user->pekerjaan}}</td>
            </tr>
            <tr>
                <td>Pekerjaan Ibu</td>
                <td>: {{$user->pekerjaan_ibu}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{$user->email}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{$user->alamat}}</td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>: {{$user->tempat_lahir}}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: {{indonesianDate($user->tgl_lahir)}}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{$user->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: {{$user->status}}</td>
            </tr>

    </table>
</div>