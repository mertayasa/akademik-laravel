<div class="card-detail"> 
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="profile-pic">
                <img src="{{ $user->getFoto() }}" width="100%" height="200px" style="object-fit: contain" alt="">
            </div>
        </div>
        <div class="col-12 col-md-8">
            <table class="table table-borderless">
                    <tr>
                        <td style="width: 150px">Nama Guru</td>
                        <td>: {{$user->nama}}</td>
                    </tr>
                    <tr>
                        <td>NIP Guru</td>
                        <td>: {{$user->nip}}</td>
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
                        <td>Status Guru</td>
                        <td>: {{$user->status_guru}}</td>
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
    </div>
</div>