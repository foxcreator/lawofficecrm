<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function courtCases()
    {
        return $this->hasMany(CourtCase::class, 'article_id', 'id');
    }
}
