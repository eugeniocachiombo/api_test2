<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsumeController extends Controller
{

    public $token, $data = [], $status, $message, $sub_id;

    public function __construct()
    {
        $this->sub_id = "genio_123";
        $this->token = "066079f2-b609-43b6-bf6a-218eb15deaf8";
    }

    public function view()
    {
        try {

            $http = Http::withHeaders([
                "x-api-key" => $this->token
            ])
                ->timeout(10)
                ->get("https://api.thecatapi.com/v1/images/search");

            if ($http->successful()) {
                $this->message = "Sucesso";
                $this->status = $http->status();
                $this->data = $http->json();
            } else {
                $this->message = json_encode($http->json());
                $this->status = $http->status();
            }
        } catch (\Exception $th) {
            $this->message = $th->getMessage();
        } finally {
            return view("welcome", [
                "data" => $this->data,
                "status" => $this->status,
                "message" => $this->message,
            ]);
        }
    }

    public function getBySeach(Request $request)
    {
        try {

            $params = [
                'limit' => $request->limit,
                'breed_ids' => $request->breed_ids,
            ];
            $params = array_filter($params, fn($value) => $value !== null && $value !== '');
           
            $http = Http::withHeaders([
                "x-api-key" => $this->token
            ])
                ->timeout(10)
                ->get("https://api.thecatapi.com/v1/images/search", $params);
            
            if ($http->successful()) {
                $this->message = "Sucesso";
                $this->status = $http->status();
                $this->data = $http->json();
            } else {
                $this->message = "Falha na requisição: " . json_encode($http->json());
                $this->status = $http->status();
            }
        } catch (\Exception $th) {
            $this->message = "Erro de conexão com a API: " . $th->getMessage();
        } finally {
            return view("welcome", [
                "data" => $this->data,
                "status" => $this->status,
                "message" => $this->message,
            ]);
        }
    }
}
