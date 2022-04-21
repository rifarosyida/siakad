@extends('mahasiswa.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2 text-center">
                <h4>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h4>
            </div>
            <h2 class="text-center">
                    KARTU HASIL STUDI (KHS)
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10">
            <strong>Nama: </strong>{{ $nilai->mahasiswa->nama }}<br>
            <strong>NIM: </strong>{{ $nilai->mahasiswa->nim }}<br>
            <strong>Kelas: </strong>{{ $nilai->mahasiswa->kelas->nama_kelas }}<br>
        </div>
        <div class="col-sm-2">
            <a href="{{ route('mahasiswa.cetakKhs', $nilai->mahasiswa->id_mahasiswa) }}" class="btn btn-success float-right">Cetak KHS</a>
        </div>
    </div>

    <table class="table table-striped mt-2">
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
        <div class="row justify-content-left">
            <a class="btn btn-primary mt-3 " href="{{ route('mahasiswa.index') }}">Kembali</a>
        </div>
    </div>
@endsection