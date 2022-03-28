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
        if (Endereco::where('cep', $request->cep)->count() == 0){
            $xml = simplexml_load_file('https://viacep.com.br/ws/'. $request->cep . '/xml/');
            $endereco = new Endereco();
            $endereco->cep = $xml->cep;
            $endereco->logradouro = $xml->logradouro;
            $endereco->complemento = $xml->complemento;
            $endereco->bairro = $xml->bairro;
            $endereco->localidade = $xml->localidade;
            $endereco->uf = $xml->uf;
            $endereco->ibge = $xml->ibge;
            $endereco->gia = $xml->gia;
            $endereco->ddd = $xml->ddd;
            $endereco->siafi = $xml->siafi;
            $endereco->save();
        }else{
            $endereco = Endereco::where('cep', $request->cep)->first();
        }
        return response()->json([
            'endereco' => $endereco
        ]);
    }

}
