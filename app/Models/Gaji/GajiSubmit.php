<?php

namespace App\Models\Gaji;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiSubmit extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payroll',
        'name',
        'jumlah',
        'total',
        'status',
        'aprv_1',
        'aprv_2',
        'aprv_3',
    ];
    public function gajisubmit()
    {
        return $this->hasMany(GajiSubmit::class);
    }
}
