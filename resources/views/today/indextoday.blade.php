@extends('layout.layout')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success bg-success">{{ session('success') }}</div>
@endif
@if (Session::has('fail'))
    <div class="alert alert-success bg-danger">{{ session('fail') }}</div>
@endif
 <div class="container" style="margin-top: 30px;">
    <div class="card">
        <h2 class="text-center" style="font-weight: 800;text-transform:uppercase;">Todays Food</h2>
        <a href="/today/tambah" class="btn btn-outline-primary">Tambah Data</a>
    </div>
    <table class="table">
        <tr>
            <th>Nama Gambar</th>
            <th>Nama Makanan</th>
            <th>Diskon</th>
            <th>Url</th>
            <th>Action</th>
        </tr>
            @foreach ($today as $t)
                <tr>
                    <td>{{ $t->image }}</td>    
                    <td>{{ $t->nama_makanan }}</td>    
                    <td>{{ $t->diskon }}</td>    
                    <td>{{ $t->url }}</td>    
                    <td>
                        <a href="/today/edit/{{ $t->id }}" class="btn btn-success">Edit</a>
                        <a href="/today/destroy/{{ $t->id }}" class="btn btn-danger" onclick="return confirm('hapus ?')">Hapus</a>
                    </td>
                </tr>            
            @endforeach
      </table>
 </div>
@endsection