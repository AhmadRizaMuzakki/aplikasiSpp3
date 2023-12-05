<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    protected $unique = 'nisn';
    protected $fillable = [
        'nisn',
        'nis',
        'nama',
        'password',
        'id_kelas',
        'no_telp',
        'alamat',
        'id_spp'
    ];
    /**
     * Get the kelas that owns the siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function spp()
    {
        return $this->belongsTo(spp::class, 'id_spp');
    }
}
