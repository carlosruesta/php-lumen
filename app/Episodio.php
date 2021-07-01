<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
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
