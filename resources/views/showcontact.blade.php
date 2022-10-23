@if ($kontak->isEmpty())
    <h6>siswa belum memiliki kontak</h6>
@else
    @foreach($kontak as $item)
        <div class="card">
            <div class="card-body">
                <strong>jenis kontak :</strong>
                <p>{{$item->jenis_kontak}}</p>
                <strong>Deskripsi kontak :</strong>
                <p>{{$item->pivot->deskripsi}}</p>
            </div>
            <div class="card-footer d-inline-flex justify-content-end">
                <a class="btn btn-sm btn-success" href="/mastercontact/{{$item->id}}/edit">edit</a>
                <form action="mastercontact/{{$item->id}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
@endif
