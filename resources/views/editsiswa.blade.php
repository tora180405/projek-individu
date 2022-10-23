@extends('layout.admin')
@section('title', 'edit siswa')
@section('content-title','edit siswa')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-2">
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
                <form method="post" enctype="multipart/form-data" action="{{route('mastersiswa.update', $siswa->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">NAMA : </label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$siswa->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN : </label>
                        <input type="text" class="form-control" id="nisn" name="nisn" value="{{$siswa->NISN}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">ALAMAT : </label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$siswa->alamat}}">
                    </div>
                    <div class="form-group">
                        <label for="jk">JENIS KELAMIN : </label>
                        <select name="jk" id="jk" class="form-select form-control">
                            <option value="laki-laki" @if($siswa->jk == 'laki-laki') selected @endif>Laki-Laki</option>
                            <option value="perempuan" @if($siswa->jk == 'perempuan') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto">FOTO : </label>
                        <br>
                        <img src="{{asset('/template/img/'.$siswa->foto)}}" width="300" class="img-thumbnail" alt="">
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="about">ABOUT : </label>
                        <textarea name="about" id="about" class="form-control">{{$siswa->about}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Update">
                        <a href="{{route('mastersiswa.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection