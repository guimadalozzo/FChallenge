<?php

namespace App\Http\Controllers;

use App\Http\Services\FeegowServices;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{

    public function agendamento(Request $request) {
        $service = FeegowServices::getSpecialties();
        $especialidades = $service->getData();

        $especialistas = null;
        $spec = 0;
        if (!empty($request->get('especialidade'))) {
            $service = FeegowServices::getProfessionals($request->get('especialidade'));
            $especialistas = $service->getData();
            $especialistas = $especialistas->professionals;
            $spec = $request->get('especialidade');
        }

        $stored = $request->session()->has('AGENDADO');
        $request->session()->forget('AGENDADO');

        
        return view('pages.agendamento')->with(['especialidades' => $especialidades->specialties, 'especialistas' => $especialistas, 'spec' => $spec, 'stored' => $stored]);
    }

    public function create(Request $request) {
        $especialista_id = $request->get('specId');
        $professional_id = $request->get('profId');
        
        $service = FeegowServices::getProfessional($professional_id);
        $professional = $service->getData();
        $professional = $professional->data;

        $service = FeegowServices::getSource($professional_id);
        $sources = $service->getData();

        return view('pages.agendar')->with(['professional' => $professional[0], 'specId' => $especialista_id, 'profId' => $professional_id, 'sources' => $sources->data]);
    }

    public function store(Request $request) {
        Agendamento::create([
            "specialty_id" => $request->get('specId'),
            "professional_id" => $request->get('profId'),
            "source_id" => $request->get('source'),
            "name" => $request->get('nomeCompleto'),
            "cpf" => $request->get('cpf'),
            "birthdate" => $request->get('birthdate')
        ]);

        $request->session()->put(['AGENDADO' => TRUE]);
        
        return redirect('/');
    }
}
