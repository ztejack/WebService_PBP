<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLocation extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location',
    ];

    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function employee()
    {
        return $this->hasMany(Employe::class);
    }
}
