<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nip',
        'npwp',
        'ttl',
        'address',
        'ktp_address',
        'gender',
        'religion',
        'blood_type',
        'golongan',
        'status',
        'date_start',
        'tenure',
        'contract_type',
        'subsatker_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id'
    ];
}
