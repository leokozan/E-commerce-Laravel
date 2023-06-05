<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagens_produtos extends Model
{
    use HasFactory;
    
    protected $table = 'imagens_produtos';
    protected $fillable = ['imagem','id_produto'];

    public function img_prod(){
        return $this->belongsTo(Produto::class,'id_produto');
    }
}
