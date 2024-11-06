@extends('layout.layout')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (Session::has('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif

    <div class="container" style="margin-top: 30px;">
        <div class="card">
            <div class="card-header">
                <h3>TAMBAH DATA</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('storetoday') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input type="file" class="form-control" id="image" name="image">
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                      <label for="namaMakanan" class="form-label">Nama Makanan</label>
                      <input type="text" class="form-control" id="namaMakanan" name="nama_makanan"  value="{{ old('nama_makanan') }}">
                    </div>
                    @error('nama_makanan')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon</label>
                        <input type="text" class="form-control" id="diskon" name="diskon"  value="{{ old('diskon') }}">
                    </div>
                    @error('diskon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="url" class="form-label">Url</label>
                        <input type="text" class="form-control" id="url" name="url"  value="{{ old('url') }}">
                    </div>
                    @error('url')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-outline-primary rounded-pill">Tambah Data</button>
                  </form>
            </div>
        </div>
    </div>
@endsection