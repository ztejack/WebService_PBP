<?php

namespace App\Models\Gaji;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gapok',
        'tnj_ahli',
        'total_gaji',
        'tnj_jabatan',
        'type_tunjab',
        'employe_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
    public function tunjangan()
    {
        return $this->belongsTo(Tunjangan::class);
    }
}
