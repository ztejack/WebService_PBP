<?php

namespace App\Models\Gaji;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangan_lain extends Model
{
    use HasFactory;
    protected $table = 'tunjangans';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_tnj',
        'jenis_tnj',
        'jumlah_tnj',
        'gaji_id',
    ];
    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
        return $this->belongsToMany(Gaji::class, 'pivot_tnj_gaji');
    }
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
