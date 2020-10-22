<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Servico extends Model
{
    protected $fillable = [
        'titulo',
        'texto',
        'imagem',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($servico) {
            if (is_null($servico->user_id)) {
                $servico->user_id = auth()->user()->id;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
