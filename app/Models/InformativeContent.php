<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformativeContent extends Model
{
    use HasFactory;

    function create_faq(Request $request){
        $client = new Client(['verify' => false,]);
        try {
            $response = $client->post(env('API_URL').'/questions/register', [
                'json' => [
                    'question' => $request->question,
                    'answer' => $request->answer,
                ],
            ]);
            //dd($response);

            $apiData = $response->getBody()->getContents();
            return $response->getStatusCode();
            //$data = json_decode($apiData, true);
            //dd($data);

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function faqs(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/questions');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function news(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/news');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function drop_news($news_id){
        try {
            $client = new Client(['verify' => false,]);
            $response = $client->request('DELETE', env('API_URL').'/news/delete/'.$news_id);
            //$apiResponse = $response->getBody()->getContents();
            //dd($response->getStatusCode());
            //dd($response);
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e);
            dd($e->getMessage());
            return $e->getCode();
        }
    }

    function show_news($id){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/news/'.$id);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function create_news(Request $request){
        //dd($request);
        $img = $request->file('imageNetwork');

        try {
            //site
            $file = $request->file('imageNetwork');
            //$fileContents = file_get_contents($file);
            if (!$file /*&& !$file->isValid()*/) {
                return 400;
                //dd("Falhou, sem imagem");
                //dd($file);
            }

            //Servidor


            // Criando uma instância do cliente Guzzle
            $client = new Client(['verify' => false,]);

            $response = $client->request('POST', env('API_URL').'/news/register', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'multipart' => [
                    [
                        'name' => 'imageNetwork',
                        'filename' => $file->getClientOriginalName(),
                        'contents' => fopen($file->getPathname(), 'r'),//file_get_contents($file->path()),//$fileContents,
                        //'name'     => 'imageNetwork',
                        //'filename' => $image_org,
                        //'contents' => fopen( $image_path, 'r' ),
                    ],
                    /*[
                        'name' => 'name_img',
                        'contents' => $requestImage->getClientOriginalName(),
                    ],*/
                    [
                        'name' => 'title',
                        'contents' => $request->title,
                    ],
                    [
                        'name' => 'description',
                        'contents' => $request->description,
                    ],

                ],
            ]);

            //$apiResponse = $response->getBody()->getContents();
            //dd($response);
            return $response->getStatusCode();

        } catch (\Exception $e) {

            //dd($e->getMessage());
            return $e->getCode();
        }
    }

    function update_news($news_id, Request $request){

        try {
            //site
            $file = $request->file('imageNetwork');
            //dd($request);
            // Criando uma instância do cliente Guzzle
            $client = new Client(['verify' => false,]);
            if(!$file){
                $response = $client->put(env('API_URL').'/news/update/'.$news_id, [
                    'json' => [
                        'title' => $request->title,
                        'description' => $request->description,
                    ],
                ]);
            }else {

                $response = $client->request('PUT', env('API_URL').'/news/update/'.$news_id, [
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                    'multipart' => [
                        [
                            'name' => 'imageNetwork',
                            'filename' => $file->getClientOriginalName(),
                            'contents' => fopen($file->getPathname(), 'r'),//file_get_contents($file->path()),//$fileContents,
                            //'name'     => 'imageNetwork',
                            //'filename' => $image_org,
                            //'contents' => fopen( $image_path, 'r' ),
                        ],

                        [
                            'name' => 'title',
                            'contents' => $request->title,
                        ],
                        [
                            'name' => 'description',
                            'contents' => $request->description,
                        ],

                    ],
                ]);

            }
            //$apiResponse = $response->getBody()->getContents();
            //dd($response);
            return $response->getStatusCode();

        } catch (\Exception $e) {

            //dd($e->getMessage());
            return $e->getCode();
        }
    }

}
