<?php

namespace App\Http\Controllers;

use App\Models\Serie;

class SeriesController extends BaseController
{
    public function __construct()
    {
        $this->model = Serie::class;
    }
}
