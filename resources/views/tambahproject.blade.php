@extends('layout.admin')
@section('title', 'home')
@section('content-title', 'tambah project -'. $siswa->nama)
@section('content')

<form action="{{route('masterproject.store')}}" method="post">
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <input type="hidden" id="id_siswa" name="id_siswa" value="{{ $siswa->id }}">
            <div class="form-group">
                <label for="nama_projek">Nama Project : </label>
                <input type="text" class="form-control" id="nama_projek" name="nama_projek" value="{{old('nama_projek')}}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi : </label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" value="{{old('deskripsi')}}"></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal : </label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{old('tanggal')}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn bg-gradient-success text-white">Tambah Project</button>
                <a href="/masterproject" class="btn bg-gradient-danger text-white">Kembali</a>
            </div>
    </form>
</div>
</div>

@endsection