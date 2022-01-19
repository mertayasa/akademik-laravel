<div class="col-12">
    <div class="card">
      
      <div class="card-header">
          <h4>Pengumuman</h4>
      </div>

      <div class="card-body">

          <div class="row">
              @forelse ($dashboard_data['pengumuman'] as $data)
                  <div class="col-12 bg-white pt-3 pb-0">
                      <div class="d-flex flex-row comment-row mb-2">
                          <div class="p-2 pr-5">
                              <span class="round">
                                  <img src="{{asset('admin/img/announce.png')}}"
                                      alt="user" style="border-radius: 100%; object-fit: cover; height: 3rem; width: 3rem;">
                              </span></div>
                          <div class="comment-text w-100">
                              <h5>{{ $data->judul }}</h5> 
                              <div class="comment-footer">
                                  <span class="date">{{indonesianDate($data->created_at)}}</span> 
                                  <p class="mt-3">{{ $data->deskripsi }}</p> 
                                   <p class="">{{ $data->konten }}</p>
                              </div>
                              @if ($data->lampiran)
                                <a href="{{ $data->getLampiran() }}" target="_blank" class="btn btn-primary">Lihat Lampiran</a>
                              @endif
                          </div>
                      </div>
                  </div>
                  @if(!$loop->last)
                    <hr>
                  @endif
              @empty
                  <p class="text-danger">Tidak ada pengumuman</p>
              @endforelse
          </div>
          {{-- {{$dashboard_data['pengumuman']->links()}} --}}
      </div>
    </div>
</div>