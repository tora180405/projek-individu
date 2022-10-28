@extends('layout.admin')
@section('title', 'home')
@section('content-title', 'Master siswa')
@section('content')
         @if ($massage=Session::get('success'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">x</button>
             <strong>{{$massage}}</strong>
         </div> 
         @endif

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('mastersiswa.create')}}" class="btn btn-success">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NOMOR</th>
                            <th scope="col">NISN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">JENIS KELAMIN</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($data as $i => $item)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $item -> NISN}}</td>
                            <td>{{ $item -> nama}}</td>
                            <td>{{ $item -> jk}}</td>
                            <td>{{ $item -> alamat}}</td>
                            <td>
                                <a href="{{route('mastersiswa.show', $item -> id)}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                <a href="{{route('mastersiswa.edit', $item -> id)}}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a>
                                <form action="/mastersiswa/{{$item->id}}/hapus" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>


@endsection