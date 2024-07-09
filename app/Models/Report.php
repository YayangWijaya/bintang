<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
    ];

    protected static function booted()
    {
        //
    }

    public function items()
    {
        return $this->hasMany(ReportItem::class);
    }
}
