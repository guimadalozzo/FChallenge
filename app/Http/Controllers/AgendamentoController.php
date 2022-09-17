<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FeegowServices;

class AgendamentoController extends Controller
{
    public function agendamento() {
        $specs = FeegowServices::getSpecialties();
        // $retorno = json_decode($resposta->getBody());
        $especialidades = $specs->getData();

        return view('pages.agendamento')->with(['especialidades' => $especialidades->specialties]);
    }
}
