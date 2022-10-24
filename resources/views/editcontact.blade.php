@extends('layout.admin')
@section('title', 'home')
@section('content-title', 'edit kontak')
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
            <form method="post" enctype="multipart/form-data" action="{{ route('mastercontact.update', $kontak->id )}}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_siswa" value="{{$kontak->id_siswa}}">
                <div class="form-group">
                    <label for="jk">Jenis Kontak</label>
                <select name="jenis_kontak" id="jenis_kontak" class="form-select form-control">
                    @foreach ($jenis as $item)
                        @if (old('jenis_kontak', $item->jenis_kontak_id) == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->jenis_kontak }}></option>
                        @endif
                        <option value="{{$item->id}}">{{$item->jenis_kontak}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{$kontak->deskripsi}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn bg-gradient-success text-white">edit Project</button>
                    <a href="{{route('mastercontact.index')}}" class="btn bg-gradient-danger text-white">Kembali</a>
                </div>
            </form>
        </div>
    </div>

@endsection