<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    use HasFactory;
    protected $table = 'compradors';
    protected $fillable = ['nome','data_nascimento','endereco','cpf'];
}

