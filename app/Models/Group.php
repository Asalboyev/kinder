<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $casts = [
        'images' => 'array'
    ];
    protected $fillable = ['title_uz','title_ru','title_en','students','age','images','slug'];
    public static function boot()
    {
        parent::boot();
        static::saving(function ($groups) {
            $groups->slug =\Str::slug($groups->title_uz);
        });
    }
}
