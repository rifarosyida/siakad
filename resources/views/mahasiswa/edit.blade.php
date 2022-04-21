@extends('mahasiswa.layout')
 
@section('content')
 
<div class="container mt-5">
 
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Mahasiswa
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
            <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" id="myForm"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Nim">Nim</label> 
                <input type="text" name="nim" class="form-control" id="Nim" value="{{ $mahasiswa->nim }}" aria-describedby="Nim" > 
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label> 
                <input type="text" name="nama" class="form-control" id="Nama" value="{{ $mahasiswa->nama }}" aria-describedby="Nama" > 
            </div>
            <label for="Kelas">Kelas</label>
            <select name="kelas" class="form-control">
                @foreach($kelas as $kls)
                    <option value="{{$kls->id}}" {{ $mahasiswa->kelas_id == $kls->id ? 'selected' : ''}}>{{$kls->nama_kelas}}</option>
                @endforeach
            </select>
            {{-- <div class="form-group">
                <label for="Kelas">Kelas</label> 
                <input type="text" name="kelas" class="form-control" id="Kelas" value="{{ $mahasiswa->kelas->nama_kelas }}" aria-describedby="Kelas" > 
            </div> --}}
            <div class="form-group">
                <label for="Jurusan">Jurusan</label> 
                <input type="text" name="jurusan" class="form-control" id="Jurusan" value="{{ $mahasiswa->jurusan }}" aria-describedby="Jurusan" > 
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control" id="image" value="{{ $mahasiswa->featured_image }}" ariadescribedby="Foto" >
                <img width="150px" src="{{ asset('storage/' . $mahasiswa->featured_image) }}">
            </div>
            <div class="form-group">
                <label for="No_Handphone">No_Handphone</label> 
                <input type="text" name="no_hp" class="form-control" id="No_Handphone" value="{{ $mahasiswa->no_hp }}" aria-describedby="No_Handphone" > 
            </div>
            {{-- tambahan tampilan form untuk tugas praktikum No.1; --}}
            <div class="form-group">
                <label for="Email">E-Mail</label> 
                <input type="email" name="email" class="form-control" id="Email" value="{{ $mahasiswa->email }}" aria-describedby="Email" > 
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label> 
                <input type="text" name="alamat" class="form-control" id="Alamat" value="{{ $mahasiswa->alamat }}" aria-describedby="Alamat" > 
            </div>
            <div class="form-group">
                <label for="Tanggal_Lahir">Tanggal_Lahir</label> 
                <input type="date" name="tanggal_lahir" class="form-control" id="Tanggal_Lahir" value="{{ $mahasiswa->tanggal_lahir }}" aria-describedby="Tanggal_Lahir" > 
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
