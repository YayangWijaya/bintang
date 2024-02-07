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
        'views',
        'max_candidate',
    ];

    protected $appends = [
        'type_name',
        'now',
        'expire_at',
        'available',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'vacancy_id');
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

    public function getAvailableAttribute()
    {
        if ($this->expire && date('Y-m-d', strtotime($this->expire)) < date('Y-m-d')) {
            return false;
        }

        if ($this->max_candidate && $this->max_candidate >= count($this->candidates)) {
            return false;
        }

        return true;
    }
}
