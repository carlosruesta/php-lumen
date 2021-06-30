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

    public function getTemporadaAttribute($valor) : int
    {
        return $valor;
    }

    public function getNumeroAttribute($valor)
    {
        return (int) $valor;
    }

    public function getSerieIdAttribute(int $valor)
    {
        return $valor;
    }

}
