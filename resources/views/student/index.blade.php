@extends('layout/layout')

@section('content')
<div class="content mt-3" style="width: 500px">
    <h1>Data Mahasiswa</h1>

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <a href="/student/create" class="btn btn-primary">
        Tambah Data
    </a>
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id  }}</td>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->nama }}</td>
                <td>
                    <a href="/student/{{ $student->id }}" style="text-decoration: none" class="badge bg-primary">Detail</a>|
                    <a href="/student/{{ $student->id }}/edit" style="text-decoration: none" class="badge bg-primary">Edit</a>|
                    <form action="/student/{{ $student->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" style="text-decoration: none" class="badge bg-danger border-0" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
