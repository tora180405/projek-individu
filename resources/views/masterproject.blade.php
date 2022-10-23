@extends('layout.admin')
@section('title', 'home')
@section('content-title', 'Master Project')
@section('content')

@if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" style="font-weight: 400;">
            <i class="fas fa-times"></i>
        </button>
    </div>
@endif

<div class="row">
    
    <!-- kartu 1 -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-8 font-weight-bold text-primary"><i class="fas fa-user-plus"></i>project siswa</h6>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col-lg-3">NISN</th>
                                <th scope="col-lg-1">NAMA</th>
                                <th scope="col-lg-1">ACTION</th>
                            </tr>
                        </thead>
                        @foreach($data as $item)
                        <tbody class="table-group-divider">
                            <tr>
                                <td>{{$item->NISN}}</td>
                                <td>{{$item->nama}}</td>
                                <td class="text-center">
                                    <a class="btn btn-info" onclick="show({{$item->id}})"><i class="fas fa-folder-open"></i></a>
                                    <a class="btn btn-success" href="{{ route('masterproject.tambah', $item->id)}}"><i class="fas fa-plus"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                      </table>
                      <div class="card-footer d-flex justify-content-end">
                        {{ $data->links() }}
                      </div>
                </div>
            </div>
        </div>      
    </div>

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-8 font-weight-bold text-primary"><i class="fas fa-user-plus"></i>project siswa</h6>
            </div>
            <div id="project" class="card-body text-center">
                <h6>Tidak ada data yang dipilih</h6>
            </div>
        </div>
    </div>
</div>

<script>
    function show(id){
        $.get('masterproject/'+id, function(data){
            $('#project').html(data);
        })
    }
</script>

@endsection
