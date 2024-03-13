<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    function streets(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/localitys/street');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function list_country() {
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/country/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function list_provinces($country_id) {
        $client = new Client(['verify' => false,]);

        $response = $client->request('POST', env('API_URL').'/province', [
            'json' => [
                'country_id' => $country_id,
            ]
        ]);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);

        return $data;
    }

    function list_county($country_id, $province_id){
        $client = new Client(['verify' => false,]);

        $response = $client->request('POST', env('API_URL').'/municipality', [
            'json' => [
                'country_id' => $country_id,
                'province_id' => $province_id,
            ]
        ]);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);

        return $data;
    }
}


