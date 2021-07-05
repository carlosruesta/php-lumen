<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getLinksAttribute($variavel)
    {
        return [
            'self' => "/api/episodios/{$this->id}",
            'serie' => "/api/series/{$this->serie_id}"
        ];
    }

    public function getAssistidoAttribute($valor) : bool
    {
        return $valor;
    }

    public function getTemporadaAttribute($xpto) : int
    {
        return $xpto;
    }

    public function getNumeroAttribute(int $numero): string
    {
        return '#' . $numero;
    }

    public function getSerieIdAttribute(int $valor): int
    {
        return $valor;
    }

}
