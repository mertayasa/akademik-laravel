@push('scripts')
    <script>
        // Store Nilai For Mapel
        function storeMapelNilai(){
            clearErrorMessage()
            const formMapelNilai = document.getElementById('formMapelNilai')
            const formData = new FormData(formMapelNilai)
            const mapelNilaiStoreUrl = formMapelNilai.getAttribute('action')
            const mapelListTable = document.getElementById('mapelListTable')

            fetch(mapelNilaiStoreUrl, {
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
                if (data.code == 1) {
                    mapelListTable.innerHTML = ''
                    mapelListTable.insertAdjacentHTML('beforeend', data.table)
                    $('#mapelNilaiModal').modal('hide')
                    hideFormNilai()
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                console.log(error);
                showToast(0, 'Gagal mengubah data mata pelajaran yang dinilai')
            })
        }

        // Delete mapel from list nilai
        function deleteMapelFromNilai(element){
            const deleteMapelNilaiUrl = element.getAttribute('data-url')

            Swal.fire({
                title: "Warning",
                text: "Yakin menghapus data mata pelajaran yang dinilai ? Aksi ini akan menghapus semua nilai dari anggota kelas sesuai pelajaran yang dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#169b6b',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(deleteMapelNilaiUrl, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        method: 'delete',
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
                        if (data.code == 1) {
                            mapelListTable.innerHTML = ''
                            mapelListTable.insertAdjacentHTML('beforeend', data.table)
                            hideFormNilai()
                        }
            
                        showToast(data.code, data.message)
                    })
                    .catch((error) => {
                        console.log(error);
                        showToast(0, 'Gagal menghapus data mata pelajaran yang dinilai')
                    })
                }
            })
        }

        function hideFormNilai(){
            const raportContainer = document.getElementById('raportContainer')
            if(raportContainer != undefined){
                raportContainer.classList.remove('d-none')
                raportContainer.innerHTML = ''
            }
        }

        function showNilaiRaport(showNilaiUrl){
            // console.log(showNilaiUrl);
            const raportContainer = document.getElementById('raportContainer')
            raportContainer.classList.remove('d-none')

            fetch(showNilaiUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                if (data.code == 1) {
                    raportContainer.innerHTML = ''
                    raportContainer.insertAdjacentHTML('beforeend', data.form_raport)
                    raportContainer.scrollIntoView()
                }else{
                    showToast(data.code, data.message)
                }

            })
            .catch((error) => {
                console.log(error);
                showToast(0, 'Gagal mengubah data mata pelajaran yang dinilai')
            })
        }

        function updateRaport(){
            const formUpdateRaport = document.getElementById('formUpdateRaport')
            const nmilaiUpdateUrl = formUpdateRaport.getAttribute('action')
            const formData = new FormData(formUpdateRaport)

            // for (var pair of formData.entries()) {
            //     console.log(pair[0]+ ', ' + pair[1]); 
            // }

            fetch(nmilaiUpdateUrl, {
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
                showToast(data.code, data.message)
            })
            .catch((error) => {
                console.log(error);
                showToast(0, 'Gagal mengubah data mata pelajaran yang dinilai')
            })
        }
    </script>
@endpush