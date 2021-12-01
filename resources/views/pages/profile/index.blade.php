@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
<div class="container-fluid">
    <div class="row">
      <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ $item->avatar() }}"
                   alt="Foto {{ $item->name }}">
            </div>

            <h3 class="profile-username text-center">{{ $item->name }}</h3>

            <p class="text-muted text-center">{{ $item->role }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Nama</b> <a class="float-right text-dark small">{{ $item->name }}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right text-dark small">{{ $item->email }}</a>
              </li>
              <li class="list-group-item">
                <b>Bergabung</b> <a class="float-right small text-dark">{{ $item->created_at->translatedFormat('d/m/Y') }}</a>
              </li>
              <li class="list-group-item">
                <b>Diperbaharui</b> <a class="float-right small text-dark">{{ $item->updated_at->translatedFormat('d/m/Y') }}</a>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="text-center">Edit Profil</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $item->name ?? old('name') }}">
                        @error('name')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $item->username ?? old('username') }}">
                      @error('username')
                          <div class="is-invalid">
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $item->email ?? old('email') }}">
                        @error('email')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" placeholder="Kosongkan jika tidak ingin merubah">
                        @error('password')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar" value="{{ old('avatar') }}">
                        @error('avatar')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</div>
</section>
@endsection
@push('styles')
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
@include('layouts.partials.toast')
@endpush