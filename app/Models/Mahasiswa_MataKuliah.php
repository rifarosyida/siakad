<?php

namespace App\Models;

use Database\Seeders\MataKuliahSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_matakuliah';
    protected $primaryKey = 'id';
    protected $guarded= ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
