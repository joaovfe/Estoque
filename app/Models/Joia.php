<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joia extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_item';
    protected $table = 'estoque_teste.item'; 

    protected $fillable = [
        'id_item',
        'nome',
        'descricao',
        'preco',
        'material',
        'data_criacao',
        'id_categoria',
        'id_status',
    ];
}
