<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;;
use Illuminate\Support\Facades\Storage;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];


    protected static function booted()
    {
        static::deleted(function($category) {
            if($category->icon) {
                Storage::disk('public')->delete($category->icon);
            }
        });
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function shoes()
    {
        return $this->hasMany(Shoe::class);
    }
}
