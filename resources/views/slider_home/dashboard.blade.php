@extends('layout.layout')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success bg-success">{{ session('success') }}</div>
@endif
@if (Session::has('fail'))
    <div class="alert alert-success bg-danger">{{ session('fail') }}</div>
@endif
    <div class="container-alone" style="width: 90%; margin:0 auto;">
        <h1 class="text-center my-3">Selamat Datang</h1>
    <table class="table shadow">
        <tr class="text-center">
            <th>Judul</th>
            <th>Keterangan</th>
            <th>url</th>
            <th>Action</th>
        </tr>
        @foreach ($slider as $sld)
        <tr>
            <td>{{ $sld->judul }}</td>
            <td style="word-wrap: break-word; max-width: 700px;">{{ $sld->keterangan }}</td>
            <td>{{ $sld->url }}</td>
            <td>
                <a href="/sliderhome/edit/{{ $sld->id }}" class="btn btn-success rounded">Edit</a>
                <a href="/sliderhome/tambah" class="btn btn-warning rounded">Tambah</a>
                <a href="/sliderhome/destroy/{{ $sld->id }}" class="btn btn-danger rounded" onclick="return confirm('Yakin Hapus ??')">Hapus</a>
            </td>
        </tr>
    @endforeach
    </table>
    </div>
@endsection