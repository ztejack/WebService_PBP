<?php

namespace App\Models\Gaji;

use App\Models\Employe;
use App\Models\FamilyStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiParamFamily extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tnj_familystatus',
        'family_status_id',
    ];
    public function employee()
    {
        return $this->belongsTo(Employe::class);
    }
    public function familystatus()
    {
        return $this->belongsTo(FamilyStatus::class, 'family_status_id');
    }
}
