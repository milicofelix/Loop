<?php

namespace Loop\Http\Controllers;

use GuzzleHttp\Client;

class CepServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cep)
    {
        $guzzle = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
        try{
            $response = $guzzle->get("https://viacep.com.br/ws/{$cep}/json/unicode/");
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ], 422);
        }
        return response([json_decode((string)$response->getBody(), true)], $response->getStatusCode());
    }

}
