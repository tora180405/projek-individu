<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\siswa;
use Illuminate\Http\Request;

class siswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return view('mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahsiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $massages = [
            'min' => ':attribute minimal diisi :min karakter',
            'max' => ':attribute maksimal diisi :max karakter',
            'numeric' => ':attribute harus berupa angka'
        ]; 

        //validation form
        $this->validate($request,[
            'nama' => 'required|min:7|max:30', 
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'about' => 'required|min:10'
        ], $massages);

        //ambil foto file
        

        //insert data
        if($request->foto != ''){
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = './template/img/';
            $file->move($tujuan_upload, $nama_file);
            $siswa = new siswa(); 
            $siswa->nama = $request-> nama; 
            $siswa->NISN = $request-> nisn;
            $siswa->alamat = $request-> alamat;
            $siswa->jk = $request-> jk;
            $siswa->foto = $nama_file;
            $siswa->about = $request-> about;
            $siswa->save();
        }else {
            // siswa::create([
            //     'nama' => $request-> nama, 
            //     'NISN' => $request-> nisn,
            //     'alamat' => $request-> alamat,
            //     'jk' => $request-> jk,
            //     'foto' => 'kntl',
            //     'about' => $request-> about
            // ]);
            $siswa = new siswa();
            $siswa->nama = $request-> nama; 
          $siswa->NISN = $request-> nisn;
          $siswa->alamat = $request-> alamat;
          $siswa->jk = $request-> jk;
          $siswa->foto = 123123;
          $siswa->about = $request-> about;
          $siswa->save();
        }

        Session::flash('massages', 'Data berhasil ditambahkan');
        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = siswa::find($id);
        $kontaks= $siswa->kontak()->get();
        return view('showsiswa', compact('siswa', 'kontaks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $siswa = siswa::find($id);
        return view('editsiswa', compact('siswa'));
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
        $massages = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal diisi :min karakter',
            'max' => ':attribute maksimal diisi :max karakter',
            'numeric' => ':attribute harus berupa angka'
        ]; 

        //validation form
        $this->validate($request,[
            'nama' => 'required|min:7|max:30', 
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'about' => 'required|min:10'
        ], $massages);

            if ($request->foto != ''){
            //ganti foto

            //hapus foto lama
            $siswa=siswa::find($id);
            File::delete('.
            \6/template/img/'.$siswa->foto);

            //ambil info file
            $file = $request->file('foto');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './template/img/';
            $file->move($tujuan_upload, $nama_file);

            //simpan ke database
          $siswa->nama = $request-> nama; 
          $siswa->nisn = $request-> nisn;
          $siswa->alamat = $request-> alamat;
          $siswa->jk = $request-> jk;
          $siswa->foto = $nama_file;
          $siswa->about = $request-> about;
          $siswa->save();
          Session::flash('berhasil', 'data berhasil di update');
          return redirect('/mastersiswa');
        }else{
          $siswa=siswa::find($id);
          $siswa->nama = $request-> nama; 
          $siswa->nisn = $request-> nisn;
          $siswa->alamat = $request-> alamat;
          $siswa->jk = $request-> jk;
          $siswa->about = $request-> about;
          $siswa->save();
          Session::flash('berhasil', 'data berhasil di update');
          return redirect('/mastersiswa');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $siswa=siswa::findOrFail($id);
        $siswa->delete();
        Session::flash('danger', 'Data berhasil dihapus');
        return redirect('/mastersiswa');
    }
}
