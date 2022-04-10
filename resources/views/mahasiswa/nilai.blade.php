@extends('mahasiswa.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2 text-center">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <h2 class="text-center">
                    KARTU HASIL STUDI (KHS)
            </h2>
        </div>
    </div>

    <h6><b>Nama : </b>{{ $nilai->mahasiswa->nama }}</h6>
    <h6><b>Nim : </b>{{ $nilai->mahasiswa->nim }}</h6>
    <h6><b>Kelas : </b>{{ $nilai->mahasiswa->kelas->nama_kelas }}</h6>
    <table class="table table-bordered">
        <tr>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
        @foreach ($nilai as $n)
            <tr>
                <td>{{ $n->matakuliah->nama_matkul }}</td>
                <td>{{ $n->matakuliah->sks }}</td>
                <td>{{ $n->matakuliah->semester }}</td>
                <td>{{ $n->nilai }}</td>
            </tr>
        @endforeach
    </table>
    <div class="container">
        <div class="row justify-content-end">
            <a class="btn btn-success mt-3 btn-right" href="{{ route('mahasiswa.index') }}">Kembali</a>
        </div>
    </div>
@endsection