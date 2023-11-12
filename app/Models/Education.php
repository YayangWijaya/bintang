<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'level',
        'name',
        'faculty',
        'graduation_year',
        'value',
    ];

    protected static function booted()
    {
        //
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
