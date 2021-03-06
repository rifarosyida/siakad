@extends('mahasiswa.layout')
 
@section('content')
 
<div class="container mt-5">
 @csrf
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Tambah Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="Nim">Nim</label> 
                    <input type="text" name="nim" class="form-control" id="Nim" aria-describedby="Nim" > 
                </div>
                <div class="form-group">
                    <label for="Nama">Nama</label> 
                    <input type="text" name="nama" class="form-control" id="Nama" aria-describedby="Nama" > 
                </div>
                <div class="form-group">
                    <label for="Kelas">Kelas</label> 
                    <select class="form-control" name="kelas">
                        @foreach ($kelas as $kls)
                        <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Jurusan">Jurusan</label> 
                    <input type="text" name="jurusan" class="form-control" id="Jurusan" aria-describedby="Jurusan" > 
                </div>
                {{-- Jobsheet pertemuan 10(form gambar) --}}
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="image" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="No_Handphone">No_Handphone</label> 
                    <input type="text" name="no_hp" class="form-control" id="No_Handphone" aria-describedby="No_Handphone" > 
                </div>
                {{-- tambahan tampilan form untuk tugas praktikum No.1; --}}
                <div class="form-group">
                    <label for="Email">E-Mail</label> 
                    <input type="email" name="email" class="form-control" id="Email" aria-describedby="Email" > 
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label> 
                    <input type="text" name="alamat" class="form-control" id="Alamat" aria-describedby="Alamat" > 
                </div>
                <div class="form-group">
                    <label for="Tanggal_Lahir">Tanggal_Lahir</label> 
                    <input type="date" name="tanggal_lahir" class="form-control" id="Tanggal_Lahir" aria-describedby="Tanggal_Lahir" > 
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection
