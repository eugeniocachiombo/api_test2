<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsumeController extends Controller
{

    public $token;

    public function __construct()
    {
        $this->token = "live_YfB9dUuYxzclJOKwj7dTN8iBKUqKuGDWm7tLNUbi8MlrzhT1566djcMdMRaw4cXm";
    }

    public function getData(){
        try {
            $http = Http::withHeaders([
                "x-api-key" => $this->token
            ])
            ->get("https://api.thecatapi.com/v1/images/search");

            if ($http->successful()) {
                dd($http->json());
            }else{
                dd($http->status(), $http->json());
            }
        } catch (RequestException $th) {
            dd($th->getMessage());
        }
    }

    public function view(){
        return view("welcome");
    }

    public function create(){
        
    }
}
