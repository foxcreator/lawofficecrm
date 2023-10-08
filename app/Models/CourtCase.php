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

    protected $fillable = [
        'case_number',
        'case_production_number',
        'visitor_id',
        'user_id',
        'category_id',
        'article_id',
        'google_drive_link',
        'case_status',
        'comment',
    ];

    public function getCaseStatus()
    {
        return [
            self::PENDING => 'Виконуєтся',
            self::WIN => 'Виграна',
            self::LOSE => 'Програна',
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

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    public function getCaseStatusNameAttribute()
    {
        $statuses = $this->getCaseStatus();
        return $statuses[$this->attributes['case_status']];
    }
}
