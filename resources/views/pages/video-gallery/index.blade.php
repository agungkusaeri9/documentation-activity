@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Galeri Video</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('video-galleries.index') }}">Galeri Video</a></li>
            <li class="breadcrumb-item active">Semua Video</li>
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
                 <h6>Galeri Video</h6>
                 <a href="javascript:void(0)" class="btn btn-sm btn-primary btnAdd">Tambah Video</a>
            </div>
        </div>
          <div class="card-body">
            <div class="row">
                @foreach ($items as $item)
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="timeline-item">
                                <div class="timeline-body">
                                  <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ $item->url() }}" allowfullscreen ></iframe>
                                  </div>
                                </div>
                                <div class="timeline-footer mt-4">
                                     <div class="text-center">
                                         <div class="link mb-3">
                                             {{ $item->url }}
                                         </div>
                                        <form action="{{ route('video-galleries.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
              {{ $items->links('vendor.pagination.simple-bootstrap-4') }}
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('video-galleries.store') }}" method="post" >
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
                    <label for="url">URL Video</label>
                    <input type="text" class="form-control" name="url">
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
@push('scripts')
<script>
    $(function(){
        $('.btnAdd').on('click', function(){
            $('#myModal').modal('show');
        })
    })
</script>
@endpush