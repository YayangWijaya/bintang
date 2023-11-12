<?php

namespace App\Models;

use App\Enums\JobTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'vacancies';

    protected $fillable = [
        'user_id',
        'name',
        'location',
        'type',
        'min_edu',
        'description',
        'expire',
        'views'
    ];

    protected $appends = [
        'type_name',
        'now',
        'expire_at'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'vacancy_id');
    }

    public function getTypeNameAttribute()
    {
        return JobTypeEnum::from($this->type)->name();
    }

    public function getNowAttribute()
    {
        $now = date('Y-m-d', strtotime($this->created_at)) === date('Y-m-d');
        return $now;
    }

    public function getExpireAtAttribute()
    {
        $expire = $this->expire ? date('d-m-Y', strtotime($this->expire)) : 'Tidak ditentukan';
        return $expire;
    }
}
