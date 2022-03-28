<?php

namespace App\Http\Controllers;
use App\Models\Endereco;
use Illuminate\Http\Request;

class BuscaCepController extends Controller
{

    public function index(){
        return view('ceps.index');
    }

    public function buscaCep(Request $request){
        $erro = false;
        if (Endereco::where('cep', $request->cep)->count() == 0){
            $xml = simplexml_load_file('https://viacep.com.br/ws/'. $request->cep . '/xml/');
            $endereco = new Endereco();
            if (!$xml->erro){
                $endereco->cep = (string)$xml->cep;
                $endereco->logradouro = (string)$xml->logradouro;
                $endereco->complemento = (string)$xml->complemento;
                $endereco->bairro = (string)$xml->bairro;
                $endereco->localidade = (string)$xml->localidade;
                $endereco->uf = (string)$xml->uf;
                $endereco->ibge = (string)$xml->ibge;
                $endereco->gia = (string)$xml->gia;
                $endereco->ddd = (string)$xml->ddd;
                $endereco->siafi = (string)$xml->siafi;
                $endereco->save();
            }else{
                $erro = true;
            }
        }else{
            $endereco = Endereco::where('cep', $request->cep)->first();
        }
        return response()->json([
            'endereco' => $endereco,
            'erro' => $erro
        ]);
    }

}
