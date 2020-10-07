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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
