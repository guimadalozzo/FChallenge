<?php

namespace App\Http\Services;

use App\Http\Facades\FeegowApi;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class FeegowServices
{

    public function getSpecialties() {
        $cliente = new Client(['base_uri' => FeegowApi::getPath()]);
        try {
            $resposta = $cliente->request('GET', FeegowApi::listSpecialties(), [
                'headers' => ['x-access-token' => FeegowApi::getToken()],
            ]);
        } catch (RequestException $e) {
            \Log::error("Err: getSpecialties failed!");
            \Log::error("Err: ".json_encode($e));
            return response()->json([
                'success' => false,
                'message' => config('error.list_specialties')
            ], 500);
        }

        $retorno = json_decode($resposta->getBody());
        return response()->json([
                'success' => true,
                'specialties' => isset($retorno->content) ? $retorno->content : null
            ], 200);
    }

    public function getProfessionals($specialty) {
        $data = [
            'ativo' => true,
            'especialidade_id' => $specialty
        ];

        $cliente = new Client(['base_uri' => FeegowApi::getPath()]);
        try {
            $resposta = $cliente->request('GET', FeegowApi::listProfessionals(), [
                'headers' => ['x-access-token' => FeegowApi::getToken()],
                'body' => json_encode($data)
            ]);
        } catch (RequestException $e) {
            \Log::error("Err: getProfissionals failed!");
            \Log::error("Err: ".json_encode($e));
            return response()->json([
                'success' => false,
                'message' => config('error.list_specialties')
            ], 500);
        }

        $retorno = json_decode($resposta->getBody());
        return response()->json([
                'success' => true,
                'professionals' => isset($retorno->content) ? $retorno->content : null
            ], 200);
    }

    public function getProfessional($professional) {
        $cliente = new Client(['base_uri' => FeegowApi::getPath()]);
        try {
            $resposta = $cliente->request('GET', FeegowApi::getProfessional().'?profissional_id='.$professional, [
                'headers' => ['x-access-token' => FeegowApi::getToken()]
            ]);
        } catch (RequestException $e) {
            \Log::error("Err: getProfessional failed!");
            \Log::error("Err: ".json_encode($e));
            return response()->json([
                'success' => false,
                'message' => config('error.list_specialties')
            ], 500);
        }

        $retorno = json_decode($resposta->getBody());
        return response()->json([
                'success' => true,
                'data' => isset($retorno->content->informacoes) ? $retorno->content->informacoes : null
            ], 200);
    }

    public function getSource() {
        $cliente = new Client(['base_uri' => FeegowApi::getPath()]);
        try {
            $resposta = $cliente->request('GET', FeegowApi::listSource(), [
                'headers' => ['x-access-token' => FeegowApi::getToken()]
            ]);
        } catch (RequestException $e) {
            \Log::error("Err: getSource failed!");
            \Log::error("Err: ".json_encode($e));
            return response()->json([
                'success' => false,
                'message' => config('error.list_specialties')
            ], 500);
        }

        $retorno = json_decode($resposta->getBody());
        return response()->json([
                'success' => true,
                'data' => isset($retorno->content) ? $retorno->content : null
            ], 200);
    }

}
