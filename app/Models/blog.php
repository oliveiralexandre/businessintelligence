<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Category;

class Blog extends Model
{
    protected $table = "blog";


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (is_null($blog->user_id)) {
                $blog->user_id = auth()->user()->id;
            }
        });

        static::deleting(function ($blog) {
            $blog->comments()->delete();
            $blog->tags()->detach();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->where('publicar', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('publicar', false);
    }

    public function getPublishedAttribute()
    {
        return ($this->publicar) ? 'Sim' : 'Não';
    }

    public function getEtagAttribute()
    {
        return hash('sha256', "product-{$this->id}-{$this->updated_at}");
    }

}

