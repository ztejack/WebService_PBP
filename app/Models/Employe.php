<?php

namespace App\Models;

use App\Models\Gaji\Gaji;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

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
        'nik',
        'npwp',
        'ttl',
        'address',
        'ktp_address',
        'gender',
        'religion',
        // 'golongan',
        'status',
        'date_start',
        'tenure',
        'user_id',
        'contract_id',
        'satker_id',
        'position_id',
        'golongan_id'
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
        return $this->belongsTo(User::class, 'user_id');
    }
    public function subsatker()
    {
        return $this->belongsTo(Subsatker::class);
    }
    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
    public function position()
    {
        return $this->belongsto(Position::class);
    }
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
    public function gaji()
    {
        return $this->hasOne(Gaji::class, 'employe_id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4()->getHex();
            // $model->date_start = $model->date_start ?? now();
        });
        self::created(function ($model) {
            $model->gaji()->create();
        });
    }
}
