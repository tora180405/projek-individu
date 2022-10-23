@if ($project->isEmpty())
    <h6>siswa belum memiliki project</h6>
    
@else
    @foreach($project as $item)
        <div class="card">
            <div class="card-header">
                <strong>{{ $item->nama_projek }}</strong>
            </div>
            <div class="card-body">
                <strong>Tanggal Project :</strong>
                <p>{{ $item->tanggal }}</p>
                <strong>Deskripsi Project :</strong>
                <p>{{ $item->deskripsi }}</p>
            </div>
            <div class="card-footer d-inline-flex justify-content-end">
                <a href="masterproject/{{$item->id}}/edit" class="btn-sm btn-success">Edit</a>
                <form action="{{url('masterproject', $item->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
@endif
