<?php

namespace App\Models\Gaji;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiSubmit extends Model
{
    use HasFactory;
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
    public function gajislip()
    {
        return $this->hasMany(GajiSlip::class, 'gaji_submit_id');
    }
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'gaji_slips');
    }
}
