<?php

namespace App\Models\Gaji;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sakit',
        'terlambat',
        'kosong',
        'perjalanan',
        'date',
        'employe_id'
    ];
    protected $casts = [
        'date' => 'date:Y-m-d',
    ];
    public function employee()
    {
        return $this->belongsTo(Employe::class);
    }
}
