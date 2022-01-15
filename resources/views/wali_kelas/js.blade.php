@push('scripts')
    <script>
        let select2Wali = $('.select2Wali').select2({
            theme: 'bootstrap4',
            dropdownParent: $("#waliKelasModal")
        })

        function showWaliKelasForm(element){
            const selectIdGuru = document.getElementById('selectIdGuru')
            selectIdGuru.value = selectIdGuru.getAttribute('data-selected')
            select2Wali.trigger('change')
        }

        $('#waliKelasModal').on('hidden.bs.modal', function () {
            document.getElementById('selectIdGuru').value = ''
            select2Wali.trigger('change')
            clearErrorMessage()
        })

        function setWaliKelas(){
            const formWaliKelas = document.getElementById('formWaliKelas')
            const setWaliUrl = formWaliKelas.getAttribute('action')
            const waliKelasContainer = document.getElementById('waliKelasContainer')
            const btnDeleteWali = document.getElementById('btnDeleteWali')

            fetch(setWaliUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'POST',
                body: new FormData(formWaliKelas)
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
                    btnDeleteWali.setAttribute('data-id', data.id_wali)
                    btnDeleteWali.classList.remove('d-none')
                    waliKelasContainer.innerHTML = ''
                    waliKelasContainer.insertAdjacentHTML('beforeend', data.wali_kelas_card)
                    $('#waliKelasModal').modal('hide')
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal menambahkan memperbarui data wali kelas')
            })
        }

        function deleteWaliKelas(element){
            const deleteWaliUrl = `${baseUrl}/wali_kelas/destroy/${element.getAttribute('data-id')}`
            const btnDeleteWali = document.getElementById('btnDeleteWali')
            const waliKelasContainer = document.getElementById('waliKelasContainer')

            Swal.fire({
                title: "Warning",
                text: "Yakin menghapus data wali kelas ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#169b6b',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(deleteWaliUrl, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        method: 'delete',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.code == 1) {
                            btnDeleteWali.setAttribute('data-id', '')
                            btnDeleteWali.classList.add('d-none')
                            waliKelasContainer.innerHTML = ''
                            waliKelasContainer.insertAdjacentHTML('beforeend', '<p class="text-center">Kelas tidak memiliki wali, Silahkan atur wali kelas</p>')
                        }
            
                        showToast(data.code, data.message)
                    })
                    .catch((error) => {
                        console.log(error);
                        showToast(0, 'Gagal menghapus data wali kelas')
                    })
                }
            })
        }
    </script>
@endpush