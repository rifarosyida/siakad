<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //Model Eloquen

class Mahasiswa extends Model
{
    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey
   
    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
        'no_hp',
        //tambahan kolom untuk tugas praktikum No.1;
        'email',
        'alamat',
        'tanggal_lahir',
        ];

        public function kelas()
        {
            return $this->belongsTo(Kelas::class);
        }

        public function matakuliah(){
            return $this->hasMany(MataKuliah::class);
        }
}