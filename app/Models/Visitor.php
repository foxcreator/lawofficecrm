<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\returnArgument;

class Visitor extends Model
{
    use HasFactory;

    const IS_CLIENT = 1;
    const IS_GUEST = 0;

    protected $fillable = [
        'email',
        'name',
        'surname',
        'father_name',
        'birthdate',
        'tin_code',
        'passport_number',
        'passport_issued_by',
        'passport_when_issued',
        'address',
        'phone',
        'visitor_status',
        'personal_agree',
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'visitor_id');
    }

    public function courtCases()
    {
        return $this->hasMany(CourtCase::class, 'visitor_id');
    }


    public static function getVisitorStatus()
    {
        return [
            self::IS_GUEST => 'Гість',
            self::IS_CLIENT => 'Клієнт',
        ];
    }

    public function getVisitorStatusNameAttribute()
    {
        $visitors = $this->getVisitorStatus();
        return $visitors[$this->attributes['visitor_status']];
    }
}
