@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Galeri Foto</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Galeri Foto</a></li>
            <li class="breadcrumb-item active">Semua Foto</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
                 <h6>Galeri Foto</h6>
                 <a href="javascript:void(0)" class="btn btn-sm btn-primary btnAdd">Tambah Foto</a>
            </div>
        </div>
          <div class="card-body">
            <div class="row">
              @foreach ($items as $item)
              <div class="col-sm-3">
                <a href="{{ $item->photo() }}" data-toggle="lightbox" data-title="{{ $item->name ?? 'Tidak Ada Judul' }}" data-gallery="gallery">
                  <img src="{{ $item->photo() }}" class="img-fluid w-100 mb-2 img-thumbnail" alt="{{ $item->name ?? 'Tidak Ada Judul' }}" style="height: 250px"/>
                </a>
                <div class="text-center">
                  <form action="{{ route('photo-galleries.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                  </form>
                </div>
              </div>
              @endforeach
            </div>
            <div class="row justify-content-center mt-4">
              <div class="col-12">
                {{ $items->links('vendor.pagination.simple-bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('photo-galleries.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama/Judul</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                  <label for="category">Kategori</label>
                  <select name="category" id="category" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="intership">Magang/PKL</option>
                    <option value="workshop">Workshop</option>
                    <option value="our event">Event Kami</option>
                    <option value="collaboration event">Even Kolaborasi</option>
                    <option value="sponsor event">Event Sponsor</option>
                  </select>
              </div>
                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Gambar</label>
                    <input type="file" class="form-control" name="photo">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('styles')
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@push('scripts')
<!-- Ekko Lightbox -->
<script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
@include('layouts.partials.toast')
<script>
    $(function(){
        $('.btnAdd').on('click', function(){
            $('#myModal').modal('show');
        })
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox({
            alwaysShowClose: true
          });
        });
    })
</script>
@endpush