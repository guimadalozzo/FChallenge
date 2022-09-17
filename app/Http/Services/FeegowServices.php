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
                'headers' => [ 'x-access-token' => FeegowApi::getToken()],
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

}
