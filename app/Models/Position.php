<?php

namespace App\Models;

use App\Models\Gaji\GajiParamTunJab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'position',
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     // 'user_id'
    // ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function subsatker()
    {
        return $this->belongsTo(Subsatker::class);
    }
    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
    public function employee()
    {
        return $this->hasMany(Employe::class);
    }
    public function gajiparamTnjb()
    {
        return $this->hasMany(GajiParamTunJab::class);
    }
}
