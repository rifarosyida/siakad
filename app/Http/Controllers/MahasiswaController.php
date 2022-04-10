<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Mahasiswa_MataKuliah;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Class MahasiswaController extends Controller
{
    public function nilai($id)
    {
        $nilai = Mahasiswa_MataKuliah::with("matakuliah")->where("mahasiswa_id", $id)->get();
        $nilai->mahasiswa = Mahasiswa::with('kelas')->where('id_mahasiswa', $id)->first();
        return view('mahasiswa.nilai', compact('nilai'));
    }

    public function index()
    {
         //fungsi eloquent menampilkan data menggunakan pagination
         //mengurutkan berdasarkan NIM

        // $mahasiswa = Mahasiswa::orderBy('nim', 'desc')->paginate(3);
        // return view('mahasiswa.index', compact('mahasiswa'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        $mahasiswa = Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->paginate(3);
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create', ['kelas' => $kelas]);
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
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_hp = $request->get('no_hp');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        //fungsi eloquent untuk menambah data dengan relasi BelongsTo
        //Mahasiswa::create($request->all());
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
   
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
         //  $Mahasiswa = Mahasiswa::find($Nim);
         $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
         return view('mahasiswa.detail', ['Mahasiswa'=> $mahasiswa]);
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
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
         return view('mahasiswa.edit', compact('mahasiswa', 'kelas'));
    }
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
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $Nim)->first();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_hp = $request->get('no_hp');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        //fungsi eloquent untuk menambah data dengan relasi BelongsTo
        //Mahasiswa::create($request->all());
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

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

