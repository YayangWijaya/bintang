<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'candidates',
        'presence',
        'pass',
        'type',
    ];

    protected static function booted()
    {
        //
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
