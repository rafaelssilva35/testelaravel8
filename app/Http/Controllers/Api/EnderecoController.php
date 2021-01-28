<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Services\Endereco\BuscaCep\Cep;
use App\Http\Requests\EnderecoRequest;
class EnderecoController extends Controller
{
    public function store(EnderecoRequest $request)
    {
        return Endereco::where('cep', $request->cep)->first() ?? Endereco::create($request->toArray());
    }

    public function show($cep)
    {
        $endereco = (Endereco::where('cep', $cep)->first());

        if ($endereco == null) {            
            $endereco = Cep::get($cep);
        }

        return $endereco;
    }

    public function update(Request $request, $id)
    {
        $endereco = Endereco::find($id);

        if ($endereco) {
            $endereco->update($request->toArray()); 
            return $endereco;
        }

        return response()->json('Endereço não encontrado', 404);
    }

    public function destroy($id)
    {
        try {
            $result = Endereco::destroy($id);
        } catch (\Exception $th) {
            throw 'Erro ao deletar';
        }
        return $result?response()->json('Endereço deletado', 200):response()->json('Indice não encontrado', 404);
    }

    public function search($logradouro)
    {
        $orders = Endereco::search($logradouro)->get();
        return $orders;
    }
}
