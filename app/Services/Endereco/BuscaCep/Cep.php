<?php

namespace App\Services\Endereco\BuscaCep;
use App\Services\Endereco\ViaCep\FindByCep;
use App\Models\Endereco;

class Cep
{
    public static function get($cep, $via_sep = 'viacep')
    {
        if ($via_sep == 'viacep') {
            // dd($cep);
            $endereco = Endereco::where('cep', $cep)->first() ?? Endereco::create(FindByCep::get($cep));
            return ($endereco);
        }
        return null;
    }
}
