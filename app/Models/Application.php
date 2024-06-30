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
        'step_name',
        'upload',
        'upload_title',
        'is_pass',
        'is_fail',
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

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function psikotestDoc()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->where('type', 2);
    }

    public function fisikDoc()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->where('type', 3);
    }

    public function kesehatanDoc()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')->where('type', 4);
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'vacancy_id');
    }

    public function getStepNameAttribute()
    {
        if ($this->terminated) {
            return 'Tidak Lolos';
        }

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
            case 6:
                return 'Lolos';
            break;
        }
    }

    public function getUploadAttribute()
    {
        if (in_array($this->step, [2,3,4])) {
            $exists = Attachment::where('attachmentable_id', $this->id)
                                    ->where('attachmentable_type', Application::class)
                                    ->where('type', $this->step)
                                    ->first();

            if ($exists) {
                return false;
            }

            return true;
        }

        return false;
    }

    public function getUploadTitleAttribute()
    {
        switch ($this->step) {
            case 2:
                return 'Psikotest';
            break;
            case 3:
                return 'Fisik';
            break;
            case 4:
                return 'Kesehatan';
            break;
            default:
                return '';
        }
    }

    public function getIsPassAttribute()
    {
        return $this->step === 6 && $this->terminated === false;
    }

    public function getIsFailAttribute()
    {
        return $this->terminated;
    }
}
