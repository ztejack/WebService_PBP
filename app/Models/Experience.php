<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'position',
        'location',
        'datestart',
        'dateend',
        'employe_id'
    ];
    public function employee()
    {
        return $this->belongsTo(Employe::class);
    }
}
