<?php

namespace App\Models;

use App\Models\Gaji\GajiParam;
use App\Models\Gaji\GajiParamTunJab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'golongan',
    ];
    public function employee()
    {
        return $this->hasMany(Employe::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function gajiparamTnjb()
    {
        return $this->hasMany(GajiParamTunJab::class);
    }
}
