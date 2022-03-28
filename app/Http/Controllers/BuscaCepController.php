<?php

namespace App\Http\Controllers;

class BuscaCepController extends Controller
{

    public function index(){
        return view('ceps.index');
    }

    public function show($cep){
        dd($cep);
    }

}
