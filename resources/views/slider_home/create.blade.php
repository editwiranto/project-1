@extends('layout.layout')
@section('content')
   <div class="container" style="margin-top: 30px;">
    <div class="card shadow">
        <div class="card-header bg-secondary-subtle">
            <h4>Tambah Data</h4>
        </div>
        <div class="card-body">
            <form action="" method="post">

                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                  </div>
                  <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                  </div>
                  <div class="mb-3">
                    <label for="url" class="form-label">Url</label>
                    <input type="text" class="form-control" id="url" name="url">
                  </div>
                  <button type="submit" class="btn btn-outline-primary rounded-pill">Tambah Data</button>
            </form>
        </div>
        <div class="card-footer bg-secondary-subtle">
            <h3>ini footer</h3>
        </div>
    </div>
   </div>
@endsection