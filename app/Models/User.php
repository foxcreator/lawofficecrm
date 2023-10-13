<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    const ROLE_ADMIN = 1;
    const ROLE_MANAGER = 2;
    const ROLE_ADVOCATE = 3;
    const ROLE_GUEST = 4;

    const GENDER_MAN = 1;
    const GENDER_WOMAN = 2;

    static $roleMappings = [
    'super-user' => 'Директор',
    'manager' => 'Консультант',
    'advocate' => 'Адвокат',
    'guest' => 'Гість',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'surname',
        'birthdate',
        'phone',
        'gender',
        'is_working',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'user_id');
    }

    public function courtCases()
    {
        return $this->hasMany(CourtCase::class, 'user_id');
    }

    public static function getRole()
    {
        return [
            self::ROLE_ADMIN => 'Директор',
            self::ROLE_MANAGER => 'Консультант',
            self::ROLE_ADVOCATE => 'Адвокат',
            self::ROLE_GUEST => 'Гість',
        ];
    }

    public function getRoleNameAttribute()
    {
        $roles = $this->getRole();
        return $roles[$this->attributes['role']];
    }

    public static function getGender()
    {
        return [
            self::GENDER_MAN => 'Чоловік',
            self::GENDER_WOMAN => 'Жінка',
        ];
    }
}
