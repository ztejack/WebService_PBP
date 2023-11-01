<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable implements JWTSubject
{
    // use HasUuids;
    use  HasFactory, Notifiable, HasRoles, HasApiTokens, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'username',
        'name',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $table = 'users';

    // public $incrementing = false;
    // protected $keyType = 'string';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        // return SlugOptions::create()
        //     ->generateSlugsFrom('name')
        //     ->saveSlugsTo('slug');
        return SlugOptions::create()
            ->generateSlugsFrom('uuid')
            ->saveSlugsTo('slug');
    }
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getSatkerAttribute()
    {
        return $this->employee->satker;
    }
    public function getGolonganAttribute()
    {
        return $this->employee->golongan;
    }
    public function getPositionAttribute()
    {
        return $this->employee->position;
    }
    public function getGajiAttribute()
    {
        return $this->employee->gaji;
    }
    public function getAbsensiAttribute()
    {
        return $this->employee->absensi;
    }

    public function hasRole($roleName)
    {
        return $this->role == $roleName; // sample implementation only
    }

    public function isSuperUser()
    {
        return $this->hasRole('SuperUser');
    }


    /**
     * Return a model value array, containing any relation model.
     *
     * @return array
     */
    public function employee()
    {
        return $this->hasone(Employe::class, 'user_id');
    }
    public function subsatker()
    {
        return $this->belongsToMany(Subsatker::class);
    }
    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            // $user = static::create($model->attributes);
            // dd($user);
            // dd($model->Id());
            $model->employee()->create([
                'contract_id' => mt_rand(1, 2),
                'satker_id' => mt_rand(1, 3),
                'position_id' => mt_rand(1, 4),
                'golongan_id' => mt_rand(1, 12)
            ]);
        });
    }
}
