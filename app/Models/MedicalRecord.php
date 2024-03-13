<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    function medical_center(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/organicunitys/organic_unity/category/5');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function create_allergy(Request $request){
        $client = new Client(['verify' => false,]);
        try {
            $response = $client->post(env('API_URL').'/allergys/create', [
                'json' => [
                    'name' => $request->name,
                ],
            ]);
            //dd($response);

            $apiData = $response->getBody()->getContents();
            return $response->getStatusCode();
            //$data = json_decode($apiData, true);
            //dd($data);

        } catch (\Exception $e) {
            dd($e->getMessage());
            return $e->getCode();
        }

    }

    function allergies(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/allergys/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function create_chronic(Request $request){
        $client = new Client();
        try {
            $response = $client->post(env('API_URL').'/chronicDiseases/create', [
                'json' => [
                    'name' => $request->name,
                ],
            ]);
            //dd($response);

            $apiData = $response->getBody()->getContents();
            return $response->getStatusCode();
            //$data = json_decode($apiData, true);
            //dd($data);

        } catch (\Exception $e) {
            dd($e->getMessage());
            return $e->getCode();
        }

    }

    function blood_groups(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/bloodGroup/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function surgerys(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/surgerys/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function chronic_diseases(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/chronicDiseases/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function prescriptions(){
        //dd(session()->get('userAuth'));
        $user_id = session()->get('userAuth')['id'];
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/prescriptions/medicines/'.$user_id);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function list_medical_areas(){
        //$user_id = session()->get('userAuth')['id'];
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/medical_area/all', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
        ]);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        
        return $data;
    }

    function create_medical_area(Request $request){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);
        //dd($request);
        try {
            $response = $client->post(env('API_URL').'/medical_area/register', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'name' => $request->name,
                ],
            ]);

            $apiData = $response->getBody()->getContents();
            //dd($apiData);
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function drop_medical_area($area_id){
        $token = session()->get('token');
        try {
            $client = new Client(['verify' => false,]);
            $response = $client->request('DELETE', env('API_URL').'/medical_area/delete/'.$area_id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);
            //$apiResponse = $response->getBody()->getContents();
            //dd($response->getStatusCode());
            //dd($response);
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e);
            //dd($e->getMessage());
            return $e->getCode();
        }
    }

    function update_medical_area($area_id, Request $request){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);
        //dd($request);
        try {
            $response = $client->put(env('API_URL').'/medical_area/update/'.$area_id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'name' => $request->name,
                    //'medical_area_id' => $request->medical_area_id,
                ],
            ]);

            $apiData = $response->getBody()->getContents();
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function create_specialtie(Request $request){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);
        //dd($request);
        try {
            $response = $client->post(env('API_URL').'/categorys/create', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'name' => $request->name,
                    'medical_area_id' => $request->medical_area_id,
                ],
            ]);

            $apiData = $response->getBody()->getContents();
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function update_specialtie($specialtie_id, Request $request){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);
        //dd($request);
        try {
            $response = $client->put(env('API_URL').'/categorys/update/'.$specialtie_id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'name' => $request->name,
                    'medical_area_id' => $request->medical_area_id,
                ],
            ]);

            $apiData = $response->getBody()->getContents();
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function drop_specialtie($specialtie_id){
        $token = session()->get('token');
        try {
            $client = new Client(['verify' => false,]);
            $response = $client->request('DELETE', env('API_URL').'/categorys/delete/'.$specialtie_id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ]
            ]);
            //$apiResponse = $response->getBody()->getContents();
            //dd($response->getStatusCode());
            //dd($response);
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e);
            //dd($e->getMessage());
            return $e->getCode();
        }
    }

    function specialties(){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/categorys/all', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
        ]);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        //dd($data);
        return $data;
    }

    function list_specialties($area_id){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/categorys/all/'.$area_id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json', // Pode ser necessário ajustar conforme a API que você está acessando
            ],
        ]);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        
        return $data;
    }

    function list_medical_record($user_id){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/users/'.$user_id/*, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json', 
            ],
        ]*/);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        
        return $data;
    }

    function create_clinical_datas(Request $request){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);
        //dd($request->allergys2==null?$request->allergys:"$request->allergys,$request->allergys2");
        try {
            $response = $client->post(env('API_URL').'/clinicalDatas/create', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    
                    'user_id' => $request->user_id,
                    'chronicdiseases' => $request->chronicdiseases2==null?$request->chronicdiseases:"$request->chronicdiseases,$request->chronicdiseases2",
                    'blood_group_id' => $request->bload_group_id,
                    'allergys' => $request->allergys2==null?$request->allergys:"$request->allergys,$request->allergys2",
                    'surgerys' => $request->surgerys,
                ],
            ]);

            $apiData = $response->getBody()->getContents();
            //dd($apiData);
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }
}
