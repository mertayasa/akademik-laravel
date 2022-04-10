@push('scripts')
    <script>
        let select2Jadwal = $('.select2Jadwal').select2({
            theme: 'bootstrap4',
            dropdownParent: $("#jadwalModal")
        })

        const btnStoreJadwal = document.getElementById('btnStoreJadwal')
        const btnUpdateJadwal = document.getElementById('btnUpdateJadwal')
        let updateUrl

        $('#jadwalModal').on('hidden.bs.modal', function () {
            document.getElementById('idMapel').value = ''
            document.getElementById('idGuru').value = ''
            document.getElementById('hari').value = ''
            select2Jadwal.trigger('change')
            formJadwal.reset()
            clearErrorMessage()
        })

        function refresMapelNilaiList(table){
            const mapelListTable = document.getElementById('mapelListTable')
            mapelListTable.innerHTML = ''
            mapelListTable.insertAdjacentHTML('beforeend', table)
        }

        function editJadwal(element){
            updateUrl = element.getAttribute('data-url')
            const jadwal = JSON.parse(element.getAttribute('data-jadwal'))
            btnUpdateJadwal.classList.remove('d-none')
            btnStoreJadwal.classList.add('d-none')

            document.getElementById('idKelas').value = jadwal.id_kelas
            document.getElementById('idTahunAjar').value = jadwal.id_tahun_ajar
            document.getElementById('idMapel').value = jadwal.id_mapel
            document.getElementById('idGuru').value = jadwal.id_guru
            document.getElementById('hari').value = jadwal.hari
            document.getElementById('jamMulai').value = jadwal.jam_mulai
            document.getElementById('jamSelesai').value = jadwal.jam_selesai
            select2Jadwal.trigger('change')
        }

        function createJadwal(element){
            btnStoreJadwal.classList.remove('d-none')
            btnUpdateJadwal.classList.add('d-none')
        }

        btnUpdateJadwal.addEventListener('click', event => {
            clearErrorMessage()
            const formJadwal = document.getElementById('formJadwal')
            const actionUrl = updateUrl
            const formData = new FormData(formJadwal)
            formData.append('_method', 'PATCH')
            
            fetch(actionUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'POST',
                body: formData
            })
            .then(response => {
                const data = response.json()
                if (response.status == 400) {
                    data.then((res) => {
                        const errors = res.errors
                        showValidationMessage(errors)
                    })
                }

                return data
            })
            .then(data => {
                // console.log(data)
                if (data.code == 1) {
                    refresMapelNilaiList(data.table)
                    $('#jadwalModal').modal('hide')
                    $('#jadwalDataTable').DataTable().ajax.reload();
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal mengubah data jadwal')
            })
        })

        btnStoreJadwal.addEventListener('click', event => {
            clearErrorMessage()
            const formJadwal = document.getElementById('formJadwal')
            const storeJadwalUrl = formJadwal.getAttribute('action')

            fetch(storeJadwalUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'POST',
                body: new FormData(formJadwal)
            })
            .then(response => {
                const data = response.json()
                if (response.status == 400) {
                    data.then((res) => {
                        const errors = res.errors
                        showValidationMessage(errors)
                    })
                }

                return data
            })
            .then(data => {
                // console.log(data);
                if (data.code == 1) {
                    refresMapelNilaiList(data.table)
                    $('#jadwalModal').modal('hide')
                    $('#jadwalDataTable').DataTable().ajax.reload();
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal menambahkan data jadwal')
            })
        })
    </script>
@endpush
