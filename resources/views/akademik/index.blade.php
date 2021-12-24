@extends('layouts.app')


@section('content')
    <div class="container-fluid p-0">
    <div class="card-header d-flex justify-content-between mb-5" style="align-self: flex-start; width: 40%;">
        {!! Form::label('user', 'Tahun Ajaran ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_tahun_ajar', $tahun_ajar, null, ['class' => 'form-control', 'id' => 'filterStatus', 'onchange' => 'updateTable()']) !!}

    </div>


                <div class="w-100">
                    <div class="row">
                        @foreach ($kelas as $data)
                        <div class="col-sm-4" id="card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4"> Jenjang Kelas </h5>
                                    <div class="card-box ">
                                <div class="inner">
                                    <h1 class="mt-1 "> {{$data->kelas->kode}}</h1>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                </div>
                                    <p> Total Anggota :  </p>
                                    <p> Wali Kelas : {{$data->user->nama}}  </p>
                                    <a href="{{ route('anggota_kelas.index', $data->id_kelas) }}" class="btn btn-primary stretched-link">Lihat Kelas</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
          
    </div>
@endsection

@push('scripts') 
    <script type="text/javascript" src="plugin/datatables/datatables.min.js"></script>
    <script>
        $(function () {
            $('#sampleTable').DataTable({
                processing: true,
                serverSide: false
            });
        });
    </script>
<script>
    function updateTable(){
      const filterStatus = document.getElementById('filterStatus').value
      $('#card').datatable().ajax.url(url + `/${filterStatus}`).load();
    }

     function getFloorPlan(merchantSelect){
      const merchantName = merchantSelect.options[merchantSelect.selectedIndex].text
      const merchantId = merchantSelect.options[merchantSelect.selectedIndex].value
      const merchantNameElement = document.getElementById('merchantName')

      merchantNameElement.innerHTML = merchantId.length > 0 ? merchantName : '-'
      sumAmountElement.innerHTML = 'Rp. 0'
      clearFloorPlan()

      if(merchantId.length > 0){
        $.ajax({
          url: "{{url('payment/get-merchant')}}" + '/' + merchantId,
          method: "GET",
          data:{"_token": "{{ csrf_token() }}"},
          dataType:'json',
          beforeSend:function(){

              // console.log('begin update')
          },
          success:function(data){
            noMerchantInfo.classList.add('d-none')
            appendFloorPlan(data)
            updateSumAmount(data.sum_amount)
          }
        })
      }else{
        noMerchantInfo.classList.remove('d-none')
      }
    }

  </script>

@endpush