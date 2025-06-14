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
        $this->getData();
    }

    public function getData()
    {
        try {
            $http = Http::timeout(10)
                ->withHeaders([
                    "x-api-key" => $this->token
                ])
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
        }
    }

    public function getByLimit(Request $resquest)
    {
        try {
            $http = Http::timeout(10)
                ->withHeaders([
                    "x-api-key" => $this->token
                ])
                ->get("https://api.thecatapi.com/v1/images/search", [
                    "limit" => $resquest->limit
                ]);

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

    public function view()
    {
        return view("welcome", [
            "data" => $this->data,
            "status" => $this->status,
            "message" => $this->message,
        ]);
    }

    public function create() {}
}
