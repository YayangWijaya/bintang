<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;

class Candidate extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'pob',
        'dob',
        'gender',
        'religion',
        'status',
        'ktp_number',
        'cv',
        'photo',
        'document',
    ];

    protected $appends = [
        'cv_url',
        'photo_url',
        'document_url',
        'wa',
        'age',
    ];

    protected static function booted()
    {
        //
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function getCvUrlAttribute()
    {
        return Storage::url($this->cv);
    }

    public function getPhotoUrlAttribute()
    {
        return Storage::url($this->photo);
    }

    public function getDocumentUrlAttribute()
    {
        return Storage::url($this->document);
    }

    public function getWaAttribute()
    {
        $wa = preg_replace('/^0/mi', '62', $this->phone);
        return $wa;
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }
}
