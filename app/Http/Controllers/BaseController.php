<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{
    protected $model;

    public function index(Request $request)
    {
        return $this->model::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        // ler o que o usuario esta mandando
        $dados = $request->all();

        // gravar em banco
        $retorno = $this->model::create($dados);

        // retornar uma resposta
        return response()->json($retorno, 201);
    }

    public function show(int $id)
    {
        // solicitar ao banco
        $serie = $this->model::find($id);

        if (is_null($serie)) {
            return response()->json(null, 204);
        }

        // conversao de dados
        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        // solicitar ao banco
        $serie = $this->model::find($id);

        if (is_null($serie)) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Série não encontrada'
            ], 404);
        }

        // gravar em banco
        $serie->fill($request->all());

        $serie->save();

        // conversao de dados
        return response()->json($serie);
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = $this->model::destroy($id);

        if ($qtdRecursosRemovidos === 0) {
            return response()->json([
                "erro" => "Recurso não encontrado"
            ], "404");
        }

        return response()->json([], 204);
    }

}
