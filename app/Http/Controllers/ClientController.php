<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\InformativeContent;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ClientController extends Controller
{

    public function make_appointment(Request $request){
        //dd($request);
        try {

            $client = new Client(['verify' => false,]);

            $response = $client->post(env('API_URL').'/consultations/consultation_not_auth', [
                'json' => [
                    /*'phoneNumber' => $request->phoneNumber,
                    'password' => $request->password.'',*/
                    "name" => $request->name,
                    "phoneNumber" => $request->phone,
                    "email" => $request->email,
                    "professional_id" => $request->professional_id,
                    "organic_unity_id" => $request->health_unit,
                    "problemDescription" => $request->message,
                    "identification" => $request->card
                ],
            ]);


            $apiData = $response->getBody()->getContents();

            $data = json_decode($apiData, true);

            //dd($data);

            if ($response->getStatusCode() == 200) {

                // Se a resposta for bem-sucedida, retorna uma resposta JSON com status 'success' e a mensagem de sucesso
                return 'OK';/*response()->json([
                    'status' => 'success',
                    'message' => 'Sua solicitação foi enviada com sucesso. Obrigado!',
                    'data' => $data // Você pode incluir dados adicionais da API, se necessário
                ]);*/
            } else {
                // Se a resposta não for bem-sucedida, retorna uma resposta JSON com status 'error' e a mensagem de erro da API
                return 'Erro ao processar a solicitação. Tente novamente mais tarde.';

            }

        } catch (\Exception $e) {

            return 'Algo deu errado tente novamente! Verifique os campos.';

        }

    }

    public function index(){
        $news = [];
        $health_unit = [];

        try{

            $client = new Client(['verify' => false,]);

            $response = $client->request('GET', env('API_URL').'/organicunitys/all');

            $apiData = $response->getBody()->getContents();

            $health_unit = json_decode($apiData, true);

            $informative_content = new InformativeContent();
            $news = $informative_content->news();

        } catch (\Exception $e) {
            $health_unit = [];
            $news = [];
        }

        return view('client.index',['health_units'=> $health_unit, 'news'=>$news]);
    }


    public function show_news($id){
        $news = [];

        try{

            $informative_content = new InformativeContent();
            $news = $informative_content->news();

            $show_news = $informative_content->show_news($id);
            //dd($show_news);
        } catch (\Exception $e) {
            $news = [];
            $show_news = [];
        }

        return view('client.show_news',['news'=>$news, 'show_news'=>$show_news, "route_status"=>true]);

    }


    public function categoryHealthUnity($health_unit){

        try {
            $client = new Client(
                [
                    'verify' => false, // Esta opção desativa a verificação SSL
                ]
            );

            $response = $client->request('GET', env('API_URL')."/categorys/".$health_unit);

            $apiData = $response->getBody()->getContents();

            $data = json_decode($apiData, true);
            return response()->json([
                'success' => true,
                'message' => "Requisicao efectuada com sucesso",
                'data' => $data,
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ],$e->getCode());
        }

    }

    public function specialistHealthUnity($especiality, $health_unit){

        try {
            $client = new Client(
                [
                    'verify' => false, // Esta opção desativa a verificação SSL
                ]
            );

            $response = $client->request('GET', env('API_URL')."/professionals/".$especiality.'/'.$health_unit);

            $apiData = $response->getBody()->getContents();

            $data = json_decode($apiData, true);
            return response()->json([
                'success' => true,
                'message' => "Requisicao efectuada com sucesso",
                'data' => $data,
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ],$e->getCode());
        }

    }

}
