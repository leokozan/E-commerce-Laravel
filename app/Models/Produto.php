<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome','valor','quantidade','descricao'];

    public function img_prod(){
        return $this->hasMany(imagem_produto::class,'id_produto')
        ->withPivot('quantidade');
    }
    public function carrinhos(){
        return $this->belongsToMany(Carrinho::class);
    }
}
