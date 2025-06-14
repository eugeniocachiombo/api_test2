<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsumeController extends Controller
{

    public $token, $data = [], $status, $message;

    public function __construct()
    {
        $this->token = "066079f2-b609-43b6-bf6a-218eb15deaf8";
    }

    public function view()
    {
        try {
            $http = Http::withHeaders([
                    "x-api-key" => $this->token
                ])->get("https://api.thecatapi.com/v1/images/search")
                ->timeout(10);

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

    public function getByLimit(Request $resquest)
    {
        try {
            $http = Http::withHeaders([
                    "x-api-key" => $this->token
                ])->get("https://api.thecatapi.com/v1/images/search", [
                    "limit" => $resquest->limit
                ])->timeout(10);

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
}
