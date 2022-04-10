@push('scripts')
<script>
    $(document).ready(function() {
        // $('select:not(.custom-select)').select2({
        $('.select2Student').select2({
            theme: 'bootstrap4',
            dropdownParent: $("#studentModal")
        });
    })

    const btnStoreStudent = document.getElementById('btnStoreStudent')

    function createAnggota(){
        clearErrorMessage()
    }

    btnStoreStudent.addEventListener('click', event => {
        const formAdd = document.getElementById('formAddStudent')
        const actionUrl = formAdd.getAttribute('action')

        fetch(actionUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            method: 'POST',
            body: new FormData(formAdd)
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
            if(data.code == 1){
                $('#studentModal').modal('hide')
                $('#AnggotaKelasDataTable').DataTable().ajax.reload();
            }

            showToast(data.code, data.message)
        })
        .catch((error) => {
            showToast(0, 'Gagal menambahkan data anggota kelas')
        })
    })
</script>
@endpush