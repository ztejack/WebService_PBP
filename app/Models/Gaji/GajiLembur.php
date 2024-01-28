<?php

namespace App\Models\Gaji;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiLembur extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'jumlah',
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
