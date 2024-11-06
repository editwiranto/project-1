@extends('layout.layout')
@section('content')
   <div class="container" style="margin-top: 30px;">
    <div class="card shadow">
        <div class="card-header bg-secondary-subtle">
            <h4>Edit Data</h4>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="{{ $upd->id }}">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $upd->judul }}">
                  </div>
                  <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $upd->keterangan }}">
                  </div>
                  <div class="mb-3">
                    <label for="url" class="form-label">Url</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ $upd->url }}">
                  </div>
                  <button type="submit" class="btn btn-outline-primary rounded-pill">Edit Data</button>
            </form>
        </div>
        <div class="card-footer bg-secondary-subtle">
            <h3>ini footer</h3>
        </div>
    </div>
   </div>
@endsection