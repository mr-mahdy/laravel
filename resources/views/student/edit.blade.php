@extends('layout/layout')

@section('content')
<div class="content mt-3">
    <h1>Edit Data Mahasiswa</h1>
    <div class="card" style="width: 500px">
        <form action="/student/{{ $student->id }}" method="post" class="card-body">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim', $student->nim) }}" class="form-control @error('nim') is-invalid @enderror">
                @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $student->nama) }}" id="nama" class="form-control @error('nama') is-invalid @enderror">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="text" name="umur" id="umur" value="{{ old('umur', $student->umur) }}" class="form-control @error('umur') is-invalid @enderror">
                @error('umur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select type="text" name="id_jurusan" id="jurusan" class="form-control">
                    @foreach ($majors as $major)
                    @if($student->id_jurusan == $major->id)
                    <option value="{{ $major->id }}" selected>{{ $major->jurusan }}</option>
                    @else
                    <option value="{{ $major->id }}">{{ $major->jurusan }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
