<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak KHS</title>
    <style>
        <?php include(public_path() . '/css/styleKHS.css'); ?>
    </style>
</head>
<body>
    <h5 class="text-center mt-4">JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h5>
    <h3 class="text-center mt-5 mb-4">KARTU HASIL STUDI (KHS)</h3>
    <strong>Nama: </strong>{{ $nilai->mahasiswa->nama }}<br>
    <strong>NIM: </strong>{{ $nilai->mahasiswa->nim }}<br>
    <strong>Kelas: </strong>{{ $nilai->mahasiswa->kelas->nama_kelas }}
    <table class="table table-striped mt-2">
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Nilai</th>
        @foreach($nilai as $n)
        <tr>
            <td>{{ $n->matakuliah->nama_matkul }}</td>
            <td>{{ $n->matakuliah->sks }}</td>
            <td>{{ $n->matakuliah->semester }}</td>
            <td>{{ $n->nilai }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html> 