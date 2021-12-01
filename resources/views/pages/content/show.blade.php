@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Konten</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('contents.index') }}">Konten</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
              <div class="card card-primary">
                  <div class="card-header">
                      <h6>Detail</h6>
                  </div>
                <div class="card-body">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <td>{{ $item->title }}</td>
                      </tr>
                      <tr>
                        <th>Kategori</th>
                        <td>{{ $item->category }}</td>
                      </tr>
                      <tr>
                        <th>Link</th>
                        <td>{{ $item->link ?? 'Tidak Ada' }}</td>
                      </tr>
                      <tr>
                        <th>Dibuat</th>
                        <td>{{ $item->created_at->translatedFormat('l, d F Y') }}</td>
                      </tr>
                      <tr>
                        <th>Penulis</th>
                        <td>{{ $item->user->name }}</td>
                      </tr>
                      <tr>
                        <th>Aksi</th>
                        <td>
                            <a href="{{ route('contents.edit',$item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('contents.destroy',$item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-8">
                <div class="image">
                    <img src="{{ $item->thumbnail() }}" alt="{{ $item->title }}" class="img-fluid">
                </div>
                <div class="description mt-4">
                    {!! $item->description !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection