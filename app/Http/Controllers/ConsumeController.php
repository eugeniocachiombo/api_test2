<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsumeController extends Controller
{

    public $token, $data = [];

    public function __construct()
    {
        $this->token = "live_dYz0e29CsWPIpFlhqSi5rvYSx7JSw5C8w3ijLTuZzD1QdovCRYLL8zhgkz0fEffL";
        $this->getData();
    }

    public function getData(){
        try {
            $http = Http::timeout(10)
            ->withHeaders([
                "x-api-key" => $this->token
            ])
            ->get("https://api.thecatapi.com/v1/images/search");

            if ($http->successful()) {
                $this->data = $http->json();
            }else{
                dd($http->status(), $http->json());
            }
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
    }

    public function view(){
        return view("welcome", ["data" => $this->data]);
    }

    public function create(){
        
    }
}
