<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class projectcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=siswa::paginate(5);
        return view('masterproject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    public function tambah($id)
    {
        $siswa = siswa::find($id);
        //return siswa
        return view('tambahproject', compact('siswa'));
        //$project=siswa::find($id)->project()->get();

        //return view('tambahproject', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
        'required' => 'form ini harus diisi',
        'min' => ':attribute minimal : min karakter!!',
        'max' => ':attribute maksimal : max karakter!!',
        ];

        $this->validate($request, [
            'nama_projek' => 'required|max:100|min:1',
            'deskripsi' => 'required|min:1'
        ], $message);

        project::create([
            'id_siswa' => $request -> id_siswa,
            'nama_projek' => $request -> nama_projek,
            'deskripsi' => $request -> deskripsi,
            'tanggal' => $request -> tanggal
            //'tanggal' => date('Y-m-d')
        ]);

        Session::flash('message', 'projek berhasil ditambahkan');
        return redirect('/masterproject');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project=siswa::find($id)->project()->get();
        return view('showproject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projek = project::find($id);
        return view('editproject', compact('projek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $massage=[
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter!!',
            'max' => ':attribute maksimal :max karakter!!',
            ];
    
            $this->validate($request, [
                'nama_projek' => 'required|max:100|min:1',
                'deskripsi' => 'required|min:1'
            ], $massage);

            $projek=project::find($id);
            $projek->nama_projek = $request ->nama_projek;
            $projek->deskripsi = $request ->deskripsi;
            $projek->tanggal = $request ->tanggal;
            $projek->save();

            Session::flash('massage', 'data berhasil diedit');
            return redirect('masterproject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projek=project::findOrFail($id);
        $projek->delete();
        Session::flash('massage', 'data berhasil dihapus');
        return redirect('masterproject');
    }
}
