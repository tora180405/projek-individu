@extends('layout.admin')
@section('title', 'show siswa')
@section('content-title','show siswa')
@section('content')

<div class="row">
    
    <!-- kartu 1 -->
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header"></div>
            <div class="card-body text-center">
                <img src="{{asset('/template/img/'.$siswa->foto)}}" width="100" class="rounded-circle mt-3 mx-auto img-thumbnail">
                <h2>{{$siswa->nama}}</h2>
                <br>
                <h4 class="">{{$siswa->NISN}}</h4>
                <h4 class="">{{$siswa->alamat}}</h4>
                <h4 class="">{{$siswa->jk}}</h4>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
            <h6 class="m-8 font-weight-bold text-primary"><i class="fas fa-user-plus"></i>kontak siswa</h6>
            </div>
            <div class="card-body text-center">
                <ol>
                    @foreach ($kontaks as $kontak)
                        <li>{{$kontak->jenis_kontak}} : {{$kontak->pivot->deskripsi}}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-8 font-weight-bold text-primary"><i class="fas fa-user-plus"></i>tentang siswa</h6>
            </div>
            <div class="card-body text-center">
                <p class="mb-0">{{$siswa->about}}</p>
                <footer class="">oleh <cite title="Source Title">{{$siswa->nama}}</cite></footer>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-8 font-weight-bold text-primary"><i class="fas fa-user-plus"></i>projek siswa</h6>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>


</div>

@endsection