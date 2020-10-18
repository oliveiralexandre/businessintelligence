<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Categoria extends Model
{
    protected $fillable = [
        'nome',
    ];
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($categoria) {
            $categoria->blogs()->delete();
        });
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function blog()
    {
        return $this->belongsToMany(Blog::class); 
       
    }
}
