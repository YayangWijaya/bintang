<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'candidate_id',
        'vacancy_id',
        'step',
        'terminated',
    ];

    protected $appends = [
        'step_name'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = auth()->id();
            $model->candidate_id = auth()->user()->candidate->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function getStepNameAttribute()
    {
        switch ($this->step) {
            case 1:
                return 'Test Psikotest';
            break;
            case 2:
                return 'Test Fisik';
            break;
            case 3:
                return 'Test Kesehatan';
            break;
            case 4:
                return 'Wawancara';
            break;
        }
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'vacancy_id');
    }
}
