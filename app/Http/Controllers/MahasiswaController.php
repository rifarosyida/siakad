<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //fungsi eloquent menampilkan data menggunakan pagination
         //mengurutkan berdasarkan NIM
        $mahasiswa = Mahasiswa::orderBy('nim', 'desc')->paginate(3);
        return view('mahasiswa.index', compact('mahasiswa'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            //tambahan kolom untuk tugas praktikum No.1;
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Mahasiswa::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
         //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
         $Mahasiswa = Mahasiswa::find($Nim);
         return view('mahasiswa.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
         //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
         //$Mahasiswa = Mahasiswa::find($Nim);
         $Mahasiswa = DB::table('mahasiswa')->where('nim', $Nim)->first();;
         return view('mahasiswa.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            //tambahan kolom untuk tugas praktikum No.1;
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
        ]);
   //fungsi eloquent untuk mengupdate data inputan kita
    Mahasiswa::find($Nim)->update($request->all());
   //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
       //fungsi eloquent untuk menghapus data
       Mahasiswa::find($Nim)->delete();
       return redirect()->route('mahasiswa.index')
       -> with('success', 'Mahasiswa Berhasil Dihapus');   
    }

    public function search(Request $request){
        $keyword = $request -> cari;
        $mahasiswa = Mahasiswa::where('nama','like','%'. $keyword . '%')
            ->orWhere('nim', 'like', '%' .$keyword. '%')
            ->orWhere('jurusan', 'like', '%' .$keyword. '%')
            ->orWhere('kelas', 'like', '%' .$keyword. '%')
            ->paginate(3)->withQueryString();
        return view('mahasiswa.index', compact('mahasiswa'));
    }
}

