<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Endereco extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['cep', 'logradouro', 'complemento', 'bairro', 'localidade', 'uf'];


    public function setCepAttribute($cep)
    {
        $this->attributes['cep'] = str_replace('-', '', $cep);
    }

    public function searchableAs()
    {
        return 'logradouro';
    }
}
