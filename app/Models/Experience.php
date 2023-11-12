<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'name',
        'field',
        'from',
        'to',
        'occupation',
        'position',
        'salary',
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
