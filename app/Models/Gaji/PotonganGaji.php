<?php

namespace App\Models\Gaji;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganGaji extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_potongan',
        'jumlah_potongan',
        'date',
        'gaji_id',
    ];
    public function gaji()
    {
        return $this->belongsTo(Gaji::class);
    }
}
