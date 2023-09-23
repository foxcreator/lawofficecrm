<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 0;
    const ROLE_MANAGER = 1;
    const ROLE_ADVOCATE = 2;
    const ROLE_GUEST = 3;

    const GENDER_MAN = 1;
    const GENDER_WOMAN = 2;
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
        'role',
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
