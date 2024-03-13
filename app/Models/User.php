<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    function update_password(Request $request){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);
        
        try {
            $response = $client->put(env('API_URL').'/users/reset_password', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    //'Accept' => 'application/json',
                ],
                'json' => [
                    'password' => $request->old_password,
                    'newPassword' => $request->new_password,
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

    function update_image(Request $request){

        $img = $request->file('img');
        //dd($img->getClientOriginalName());
        try {
            if ($img) {
                $token = session()->get('token');

                $response = Http::withOptions(['verify' => false])
                ->withToken($token)
                ->attach(
                    'img', file_get_contents($request->file('img')), $img->getClientOriginalName()
                )->put(env('API_URL').'/users/update_photo');
            }else {
                return 400;
            }
            //dd($request);
            //dd($response->body());
            //dd($response->getBody()->getContents());
            return $response->status();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function patients(){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/patients/all', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
        ]);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);

        
        return $data;
    }

    function getPatient($patient_key){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/patients/consult/'.$patient_key, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
        ]);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);

        
        return $data;
    }

    function drop_health_unit($unity_id){
        try {
            $client = new Client(['verify' => false,]);
            $response = $client->request('DELETE', env('API_URL').'/organicunitys/'.$unity_id);
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

    function pharmaces(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/pharmace/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function getProfessional($id){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/professionals/'.$id);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    /*function getPatient($id){
        $client = new Client();

        $response = $client->request('GET', env('API_URL').'/users/'.$id);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }*/

    function medical_consultation(){
        $client = new Client(['verify' => false,]);


        $response = $client->request('GET', env('API_URL').'/consultations');

        // Obter o corpo da resposta como uma string JSON
        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function health_units(){
        $client = new Client(['verify' => false,]);


        $response = $client->request('GET', env('API_URL').'/organicunitys/all');

        // Obter o corpo da resposta como uma string JSON
        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function category_health_units(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/organicunitys/category/all');

        // Obter o corpo da resposta como uma string JSON
        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function clinical_states(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/clinicalStates/all');

        // Obter o corpo da resposta como uma string JSON
        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function languages()
    {
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/languages/show/all');

        // Obter o corpo da resposta como uma string JSON
        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function create_professional(Request $request){


        //dd($request);
        $img = $request->file('img');
        $file = $request->file('img');
        //dd($img->getClientOriginalName());
        try {

            if ($img) {

                $client = new Client(['verify' => false,]);

                $userAuth = session()->get('userAuth');
            
                //dd($userAuth['role_id']);

                $response = Http::withOptions(['verify' => false])->attach(
                    'img', file_get_contents($request->file('img')), $img->getClientOriginalName()
                )->post(env('API_URL').'/professionals/register', [
                    'name' => $request->name,
                    'phoneNumber' => $request->phoneNumber,
                    'email' => $request->email,
                    'password' => '12345678',
                    'name_street' => $request->name_street,
                    //'clinical_state_id' => $request->clinical_state_id,
                    'organic_unity_id' => ($userAuth['role_id']==3)? $userAuth['id']:$request->organic_unity_id,
                    'educationalInstitution' => $request->educationalInstitution,
                    'description' => $request->description,
                    'gender' => $request->gender,
                    'type_professional' => $request->type_professional,
                    'professionalLicenseNumber' => $request->professionalLicenseNumber,
                    'academicLevel' => '12',
                    'languages' => $request->languages2==null?$request->languages:"$request->languages,$request->languages2",
                    //'experiences' => 1,
                    'categorys' => $request->categorys2==null?$request->categorys:"$request->categorys,$request->categorys2",
                    'identification' => $request->identification,
                    'date' => $request->date,//'1990-12-8',
                    'academiclevel_id' => $request->academiclevel_id,
                    "country_id"=> $request->health_unit_country_id,
                    "municipality_id"=> $request->health_unit_county_id,
                    "province_id"=> $request->health_unit_province_id,
                    "name_municipality"=> $request->health_unit_county,
                    "name_province"=> $request->health_unit_province,
                ]/*,[
                    'img' => fopen($request->file('img')->getPathname(), 'r'),
                ]*/);
            }else {
                $response = Http::withOptions(['verify' => false])->post(env('API_URL').'/professionals/register', [
                    'name' => $request->name,
                    'phoneNumber' => $request->phoneNumber,
                    'email' => $request->email,
                    'password' => '12345678',
                    //'img' => $request->img,
                    'name_street' => $request->name_street,
                    'clinical_state_id' => $request->clinical_state_id,
                    'organic_unity_id' => ($userAuth['role_id']==3)? $userAuth['id']:$request->organic_unity_id,
                    'educationalInstitution' => $request->educationalInstitution,
                    'description' => $request->description,
                    'gender' => $request->gender,
                    'type_professional' => $request->type_professional,
                    'professionalLicenseNumber' => $request->professionalLicenseNumber,
                    'academicLevel' => '12',
                    'languages' => $request->languages2==null?$request->languages:"$request->languages,$request->languages2",
                    //'experiences' => 1,
                    'categorys' => $request->categorys2==null?$request->categorys:"$request->categorys,$request->categorys2",
                    'identification' => $request->identification,
                    'type_professional' => $request->type_professional,
                    'date' => $request->date,
                    'academiclevel_id' => $request->academiclevel_id,
                    "country_id"=> $request->health_unit_country_id,
                    "municipality_id"=> $request->health_unit_county_id,
                    "province_id"=> $request->health_unit_province_id,
                    "name_municipality"=> $request->health_unit_county,
                    "name_province"=> $request->health_unit_province,
                ]);
            }
            //$apiResponse = $response->getBody()->getContents();
            //dd("$request->categorys, $request->categorys2");
            //dd($response->getBody()->getContents());

            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e);
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function list_professional()
    {
        $userAuth = session()->get('userAuth');
            
        $client = new Client(['verify' => false,]);

        $response = $userAuth['role_id'] == 3?
        $client->request('GET', env('API_URL').'/professionals/organic/'.$userAuth['id']):
        $client->request('GET', env('API_URL').'/professionals/user/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);

        return $data;
    }

    function update_professional($professional_id, Request $request){

        try {

            $client = new Client(['verify' => false,]);

            $userAuth = session()->get('userAuth');
        
            //dd($userAuth['role_id']);

            $response = Http::withOptions(['verify' => false])->put(env('API_URL').'/professionals/update/'.$professional_id, [
                'name' => $request->name,
                'phoneNumber' => $request->phoneNumber,
                'email' => $request->email,
                'name_street' => $request->name_street,
                'clinical_state_id' => $request->clinical_state_id,
                'organic_unity_id' => $request->organic_unity_id,
                'educationalInstitution' => $request->educationalInstitution,
                'description' => $request->description,
                'gender' => $request->gender,
                'type_professional' => $request->type_professional,
                'professionalLicenseNumber' => $request->professionalLicenseNumber,
                'identification' => $request->identification,
                'type_professional' => $request->type_professional,
                'date' => $request->date,
                'academiclevel_id' => $request->academiclevel_id,
                "country_id"=> $request->health_unit_country_id,
                "municipality_id"=> $request->health_unit_county_id,
                "province_id"=> $request->health_unit_province_id,
                "name_municipality"=> $request->health_unit_county,
                "name_province"=> $request->health_unit_province,
            ]);
            
            //$apiResponse = $response->getBody()->getContents();
            //dd("$request->categorys, $request->categorys2");
            //dd($response->getBody()->getContents());

            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e);
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function academic_levels(){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/academicLevels/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);

        return $data;
    }

    function spacialitys()
    {
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/categorys/all');

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);

        return $data;
    }



    function create_health_units(Request $request){

        $img = $request->file('img');
        
        try {
            if ($img) {

                $response = Http::withOptions(['verify' => false])->attach(
                    'img', file_get_contents($request->file('img')), $img->getClientOriginalName()
                )->post(env('API_URL').'/organicunitys/register', [
                    "name"=>$request->name,
                    "phoneNumber"=>$request->phoneNumber,
                    "email"=>$request->email,
                    "password"=>"12345678",
                    "name_street"=>$request->name_street,
                    "sub_organic_unity_id"=>$request->sub_organic_unity_id,
                    "longuitude"=> $request->longuitude,
                    "latitude"=>$request->latitude,
                    "description"=>$request->description,
                    "country_id"=> $request->health_unit_country_id,
                    "municipality_id"=> $request->health_unit_county_id,
                    "province_id"=> $request->health_unit_province_id,
                    "name_municipality"=> $request->health_unit_county,
                    "name_province"=> $request->health_unit_province,
                ]);
            }else {
                $response = Http::withOptions(['verify' => false])->post(env('API_URL').'/organicunitys/register', [
                    "name"=>$request->name,
                    "phoneNumber"=>$request->phoneNumber,
                    "email"=>$request->email,
                    "password"=>"12345678",
                    "name_street"=>$request->name_street,
                    "sub_organic_unity_id"=>$request->sub_organic_unity_id,
                    "longuitude"=> $request->longuitude,
                    "latitude"=>$request->latitude,
                    "description"=>$request->description,
                    "country_id"=> $request->health_unit_country_id,
                    "municipality_id"=> $request->health_unit_county_id,
                    "province_id"=> $request->health_unit_province_id,
                    "name_municipality"=> $request->health_unit_county,
                    "name_province"=> $request->health_unit_province,
                ]);
            }
            //dd($request);
            //dd($response->body());
            //dd($response->getBody()->getContents());
            return $response->status();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }


    function update_health_unit(Request $request){

        try {

            $response = Http::withOptions(['verify' => false])->put(env('API_URL').'/organicunitys/update/'.$request->id, [
                "name"=>$request->name,
                "phoneNumber"=>$request->phoneNumber,
                "email"=>$request->email,
                //"password"=>"12345678",
                "name_street"=>$request->name_street,
                "sub_organic_unity_id"=>$request->sub_organic_unity_id,
                "longuitude"=> $request->longuitude,
                "latitude"=>$request->latitude,
                "description"=>$request->description,
                "country_id"=> $request->health_unit_country_id,
                "municipality_id"=> $request->health_unit_county_id,
                "province_id"=> $request->health_unit_province_id,
                "name_municipality"=> $request->health_unit_county,
                "name_province"=> $request->health_unit_province,
            ]);
            //dd($request);
            //dd($response->body());
            return $response->status();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }

    }

    function getHealthUnit($id){
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/organicunitys/'.$id);

        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function health_units_categorys(){
        $client = new Client(['verify' => false,]);


        $response = $client->request('GET', env('API_URL').'/subOrganitys/all');

        // Obter o corpo da resposta como uma string JSON
        $apiData = $response->getBody()->getContents();

        $data = json_decode($apiData, true);
        return $data;
    }

    function create_appointment_schedule(Request $request){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);
        //dd($request);
        $selectedDays = $request->input('days_week');

        if ($selectedDays) {
            $daysString = implode(',', $selectedDays);
        } else {
            $daysString = "";
        }

        try {
            $response = $client->post(env('API_URL').'/calendar/register', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'semanas' => $daysString,
                    'inicio' => $request->time,
                    'category_id' => $request->category_id,
                ],
            ]);

            $apiData = $response->getBody()->getContents();
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }
    }

    function update_appointment_schedule(Request $request, $id){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);
        //dd($request);
        $selectedDays = $request->input('days_week');

        if ($selectedDays) {
            $daysString = implode(',', $selectedDays);
        } else {
            $daysString = "";
        }

        try {
            $response = $client->post(env('API_URL').'/calendar/update/'.$id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'semanas' => $daysString,
                    'inicio' => $request->time,
                    'category_id' => $request->category_id,
                ],
            ]);

            $apiData = $response->getBody()->getContents();
            return $response->getStatusCode();

        } catch (\Exception $e) {
            //dd($e->getMessage());
            return $e->getCode();
        }
    }

    function list_appointment_schedules(){
        $token = session()->get('token');
        $client = new Client(['verify' => false,]);

        $response = $client->request('GET', env('API_URL').'/calendar/all', [
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

    function drop_appointment_schedule($id){
        $token = session()->get('token');
        try {
            $client = new Client(['verify' => false,]);
            $response = $client->request('DELETE', env('API_URL').'/calendar/delete/'.$id, [
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
            //dd($e->getMessage());
            return $e->getCode();
        }
    }
}
