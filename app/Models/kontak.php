<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'jenis_kontak_id',
        'deskripsi'
    ];
    protected $table = 'jenis_kontak_siswa';
    // public function siswa(){
    //     return $this->belongsTo('app\Models\siswa', 'id_siswa');
    // }
}
