<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $fillable = ['nomor', 'deskripsi', 'gambar', 'dipesan', 'id_tipe'];

    public function tipe(){
        return $this->belongsTo(TipeKamar::class, 'id_tipe');
    }
}