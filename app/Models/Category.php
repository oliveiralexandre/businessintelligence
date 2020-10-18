<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {
            $category->blogs()->delete();
        });
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
