@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Edit Profil</h4>
                        {{-- <a href="{{route('patient.create')}}" class="btn btn-primary">Tambah Registrasi</a> --}}
                    </div>
                    <div class="card-body">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'patch']) !!}
                        @include('profile.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Kembali</a>
                                <button class="btn btn-primary ml-3" type="submit">Simpan</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
