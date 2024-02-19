<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'attachmentable_id',
        'attachmentable_type',
        'name',
        'path',
        'size',
        'mime',
        'disk',
        'folder',
        'type',
        'info'
    ];

    protected $appends = [
        'mime_data',
        'url',
        'size_formatted'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachmentable()
    {
        return $this->morphTo();
    }

    public function getMimeDataAttribute()
    {
        return $this->mime;
    }

    public function getUrlAttribute()
    {
        return env('APP_URL') . '/download/' . $this->id;
    }

    public function getSizeFormattedAttribute()
    {
        $kb = round($this->size / 1024);

        if ($kb > 1024) {
            $mb = round($kb / 1024);

            return "{$mb} MB";
        }

        return "{$kb} KB";
    }
}
