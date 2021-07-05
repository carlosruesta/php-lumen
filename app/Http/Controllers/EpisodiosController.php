<?php

namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Database\Eloquent\Collection;

class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->model = Episodio::class;
    }

    public function buscaPorSerie(int $serieId): Collection
    {
        return Episodio::query()->where(['serie_id' => $serieId])->get();
    }
}
