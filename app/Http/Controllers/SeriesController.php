<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        // ler o que o usuario esta mandando
        $nome = $request->nome;

        // gravar em banco
        $retorno = Serie::create(['nome' => $nome]);

        // retornar uma resposta
        return response()->json($retorno, 201);
    }
}
