<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Categoria;

class Informacoes extends Model
{
    protected $table = "informacoes";

    protected $fillable = [
        'nome','categoria_id','user_id','titulo','descricao','imagem','publicar','categoria','titulourl','url',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($informacao) {
            if (is_null($informacao->user_id)) {
                $informacao->user_id = auth()->user()->id;
            }
        });

        static::deleting(function ($informacao) {
            $informacao->comments()->delete();
            $informacao->tags()->detach();
        });
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);   
    } 

    public function category()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categoria::class);
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
    public function getTextHtmlAttribute()
    {
         return nl2br(e($this->text),false);
    }

}

