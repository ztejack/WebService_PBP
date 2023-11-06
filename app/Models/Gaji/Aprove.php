<?php

namespace App\Models;

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
    ];
    public function gajisubmit()
    {
        return $this->hasMany(GajiSubmit::class);
    }
}
