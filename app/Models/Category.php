<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'category_id');
    }

    public function courtCases()
    {
        return $this->hasMany(CourtCase::class, 'case_category_id', 'id');
    }
}
