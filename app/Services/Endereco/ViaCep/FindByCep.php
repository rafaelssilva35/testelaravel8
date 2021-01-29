<?php

namespace App\Services\Endereco\ViaCep;
use Illuminate\Support\Facades\Http;

class FindByCep
{   
    public static function get($cep)
    {
        return Http::get("https://viacep.com.br/ws/$cep/json/")->json();
    }
}
