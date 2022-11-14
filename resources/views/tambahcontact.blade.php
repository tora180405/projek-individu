@extends('layout.admin')
@section('title', 'home')
@section('content-title', 'tambah kontak')
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
                <div class="card-body">
                    <form action="{{ url('mastercontact/store', $siswa->id)}}" method="POST">
                        @csrf
                        <input type="hidden" id="id_siswa" name="id_siswa" value="{{ $siswa->id }}">
                        <div class="form-group">
                            <label for="jk">Jenis kontak</label>
                        <select class="form-select form-control" name="jenis_kontak" id="jenis_kontak">
                            <option disabled selected>Pilih</option>
                            @foreach ($jenis as $item)
                                <option value="{{$item->id}}">{{$item->jenis_kontak}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('mastercontact.index')}}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection