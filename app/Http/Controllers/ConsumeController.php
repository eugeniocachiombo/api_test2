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

    public function getByLimit(Request $resquest)
    {
        try {
            $http = Http::withHeaders([
                    "x-api-key" => $this->token
                ])
                ->timeout(10)
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

    public function addFavourit(string $image_id)
    {
        try {
            $http = Http::withHeaders([
                    "x-api-key" => $this->token
                ])
                ->timeout(10)
                ->get("https://api.thecatapi.com/v1/favourites", [
                    "image_id" => $image_id,
                    "sub_id" => $this->sub_id
                ]);

            if ($http->successful()) {
                 $this->message = "Adicionado aos favoritos";
                $this->status = $http->status();
                $this->data = $http->json();
            } else {
                $this->message = json_encode($http->json());
                $this->status = $http->status();
            }
        } catch (\Exception $th) {
            $this->message = $th->getMessage();
        } catch (RequestException $th) {
            $this->message = $th->getMessage();
        } finally {
            return view("welcome", [
                "data" => $this->data,
                "status" => $this->status,
                "message" => $this->message,
            ]);
        }
    }

    public function getFavourits()
    {
        try {
            $http = Http::withHeaders([
                    "x-api-key" => $this->token
                ])
                ->timeout(10)
                ->get("https://api.thecatapi.com/v1/favourites", [
                    "sub_id" => $this->sub_id
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
        } catch (RequestException $th) {
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
