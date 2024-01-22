<?php

namespace App\Models;

use App\Models\Gaji\GajiParamFamily;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyStatus extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'familystatus',
    ];
    public function employee()
    {
        return $this->hasMany(Employe::class);
    }
    public function gajiparamfamily()
    {
        return $this->hasOne(GajiParamFamily::class);
    }
}
