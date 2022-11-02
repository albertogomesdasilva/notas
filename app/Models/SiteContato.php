<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    use HasFactory;

     protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];  // necessário para os métodos fill e create
}
