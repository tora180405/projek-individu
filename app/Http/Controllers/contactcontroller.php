<?php

namespace App\Http\Controllers;

use App\Models\jenis_kontak;
use App\Models\kontak;
use App\Models\siswa;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class contactcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=siswa::latest()->Paginate(5);
        return view('mastercontact',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jenis = jenis_kontak::all();
        $siswa = siswa::where('id', $id)->first();
        return view('tambahcontact', compact('siswa', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        kontak::create([
            'id_siswa' => $request -> id_siswa,
            'jenis_kontak_id' => $request -> jenis_kontak,
            'deskripsi' => $request -> deskripsi
        ]);

        return redirect('/mastercontact');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak=siswa::find($id)->kontak()->get();
        return view('showcontact', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $kontak = kontak::find($id);
        $jenis = jenis_kontak::all();
        return view('editcontact', compact('kontak', 'jenis'));
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
        $this->validate($request, [
            'jenis_kontak' => 'required',
            'deskripsi' => 'required|max:200'
        ]);

        $kontak = kontak::findOrFail($id);
        $kontak->id_siswa = $request->id_siswa;
        $kontak->jenis_kontak_id = $request->jenis_kontak;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();

        return redirect('mastercontact')->with('success', 'kontak Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kontak::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'kontak Added');
    }
}
