@extends('mahasiswa.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2 text-center">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <form action="{{ route('mahasiswa.search') }}" class="mt-4" method="get">
            @csrf
            <div class="row flex-row">
                <div class="col-md-4">
                    <div class="input-group">    
                        <input type="text" name="cari" class="form-control" placeholder="Cari Nama/Nim/Kelas/Jurusan" aria-label="cari" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <input type="submit" value="Cari" class="btn btn-secondary" id="cari">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="float-right my-2">
                        <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
                    </div>
                </div>                     
            </div>
        </form>
    </div>
</div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
     
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Foto</th>
            <!-- tambahan tampilan form untuk tugas praktikum No.1; -->
            <th>E-Mail</th>
            <th>Alamat</th>
            <th>Tgl_Lahir</th>
            <th>Action</th>
        </tr>
    @foreach ($paginate as $Mahasiswa)
        <tr>
 
            <td>{{ $Mahasiswa->nim }}</td>
            <td>{{ $Mahasiswa->nama }}</td>
            <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
            <td>{{ $Mahasiswa->jurusan }}</td>
            <td><img width="50px" src="{{asset('storage/'.$Mahasiswa->featured_image)}}"></td>
            {{-- <td>{{ $Mahasiswa->no_hp }}</td> --}}
            <!-- tambahan tampilan form untuk tugas praktikum No.1; -->
            <td>{{ $Mahasiswa->email }}</td>
            <td>{{ $Mahasiswa->alamat }}</td>
            <td>{{ $Mahasiswa->tanggal_lahir }}</td>
            <td width="300px">
            <form action="{{ route('mahasiswa.destroy',$Mahasiswa->nim) }}" method="POST"> 
                <a class="btn btn-info" href="{{ route('mahasiswa.show',$Mahasiswa->nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$Mahasiswa->nim) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a class="btn btn-warning" href="{{ route('nilai', $Mahasiswa->id_mahasiswa) }}">Nilai</a>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
    {{ $paginate->withQueryString()->links() }}
    </div>
@endsection
