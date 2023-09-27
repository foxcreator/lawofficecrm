<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCase extends Model
{
    use HasFactory;

    const PENDING = 0;
    const WIN = 1;
    const LOSE = 2;

    public function getCaseStatus()
    {
        return [
            self::PENDING,
            self::WIN,
            self::LOSE,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
