<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsatker extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subsatker',
        'id_satker',
        // 'password',
    ];
    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function satker()
    {
        return $this->belongsTo(Satker::class, 'id_satker');
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
