<div class="card-detail">
    <table class="table table-borderless">
        <tr>
            <td style="width: 150px">Nama Wali Kelas</td>
            <td>: {{ $wali_kelas->user->nama }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>: {{ $wali_kelas->user->nip }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $wali_kelas->user->alamat }}</td>
        </tr>
        <tr>
            <td>No Handphone</td>
            <td>: {{ $wali_kelas->user->no_tlp }}</td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>: {{ $wali_kelas->user->tempat_lahir }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>: {{ indonesianDate($wali_kelas->user->tgl_lahir) }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $wali_kelas->user->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $wali_kelas->user->email }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: {{ $wali_kelas->user->status_guru }}</td>
        </tr>

    </table>
</div>
