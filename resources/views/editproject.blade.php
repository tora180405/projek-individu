@extends('layout.admin')
@section('title', 'home')
@section('content-title', 'edit projek')
@section('content')

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
            <form method="post" enctype="multipart/form-data" action="{{route('masterproject.update', $projek->id)}}">
                @csrf
                @method('PUT')
                    <input type="hidden" id="id_siswa" name="id_siswa" value="{{ $projek->id_siswa }}">
                <div class="form-group">
                    <label for="nama_projek">Nama Project : </label>
                    <input type="text" class="form-control" id="nama_projek" name="nama_projek" value="{{$projek->nama_projek}}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi : </label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{$projek->deskripsi}}</textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal : </label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$projek->tanggal}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn bg-gradient-success text-white">edit Project</button>
                    <a href="{{route('masterproject.index')}}" class="btn bg-gradient-danger text-white">Kembali</a>
                </div>
            </form>
        </div>
    </div>

@endsection