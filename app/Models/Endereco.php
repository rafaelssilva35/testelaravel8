<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['cep', 'logradouro', 'complemento', 'bairro', 'localidade', 'uf'];


    public function setCepAttribute($cep)
    {
        $this->attributes['cep'] = str_replace('-', '', $cep);
    }
}
