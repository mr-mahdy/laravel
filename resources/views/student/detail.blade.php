@extends('layout/layout')

@section('content')
<div class="content mt-3">
    <h1>Detail Data Mahasiswa</h1>
    <div class="card" style="width: 500px">
        <div class="card-body">

            <div class="form-group">
                <label for="nim">NIM: </label>
                <span>{{ $student->nim }}</span>
            </div>
            <div class="form-group">
                <label for="nama">Nama: </label>
                <span>{{ $student->nama }}</span>
            </div>
            <div class="form-group">
                <label for="umur">Umur: </label>
                <span>{{ $student->umur }}</span>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan: </label>
                @foreach ($majors as $major)
                @if($student->id_jurusan == $major->id)
                <span>{{ $major->jurusan }}</span>
                @endif
                @endforeach
            </div>
            <div class="form-group mt-2">
                <a href="/student" class="btn btn-danger ">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
