<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampel extends Model
{
    use HasFactory;
    protected $table = 'sampel';
    protected $fillable = [
        'kode_sampel',
        'nama_sampel',
        'tanggal_pengambilan',
        'tanggal_keluar',
        'jenis_sampel',
        'status_sampel',
        'lokasi_penyimpanan',
        'keterangan'
    ];

    public static function generateKodeSampel(): string
    {
        $latestSample = Sampel::latest('id')->first();
        
        $nextNumber = $latestSample ? (int)substr($latestSample->kode_sampel, 4) + 1 : 1;
        
        return 'SPL-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }
}
