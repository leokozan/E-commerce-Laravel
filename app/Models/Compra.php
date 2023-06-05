<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compra';
    protected $fillable = [
    'cartao',
    'id_user',
    'total',
    'data_compra',
    'id_status'];
    public function compr_user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function produtos(){
        return $this->belongsToMany(Produto::class)
        ->withPivot('quantidade');
    }
    public function status(){
        return $this->belongsTo(Status::class,'id_status');
    }
}
