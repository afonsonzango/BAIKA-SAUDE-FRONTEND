<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\InformativeContent;
use App\Models\MedicalRecord;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;

class ManagementController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function appointment() {
        return view('client.make_appointment');
    }

    public function authentication(Request $request){

        try {

        $client = new Client(['verify' => false,]);

            $response = $client->post(env('API_URL').'/users/login_organic_unity_professional', [
                'json' => [
                    'username' => $request->phoneNumber,
                    'password' => $request->password.'',
                ],
            ]);

            //dd($response);

            $apiData = $response->getBody()->getContents();

            $data = json_decode($apiData, true);
            //dd($data);
            $userData = $data["userAuth"][0];

            $filteredUserData = Arr::except($userData, ['password']);

            session(['token' => $data["token"]]);
            session(['userAuth' => $filteredUserData]);

            return redirect()->route("management");

        } catch (\Exception $e) {
            if ($e->getCode() == 401) {
                return redirect()->back()->with('fail', 'Conta não autorizada - Telefone ou Senha errada');
                //dd("Conta não autorizada");
            }else{
               //dd($e->getMessage());
                return redirect()->back()->with('fail', 'Algo deu errado na autenticação! Tente novamente.');

            }
        }

    }

    public function logout()
    {
        session()->forget('userAuth');
        session()->forget('token');
        return redirect()->route('init');
    }

    public function my_profile(){
        $userAuth = session()->get('userAuth');
        
        if ($userAuth['role_id'] == 2) {
            try {
                $user = new User();
                //$professional = $user->getProfessional(Crypt::decryptString($id));
    
                $especialtys = session()->get('especialtys');
                $category_health_units = session()->get('category_health_units');
                
                //dd($category_health_units);
                $clinical_states = session()->get('clinical_states');
                $languages = session()->get('languages');
                //dd($languages);
                $academic_levels = session()->get('academic_levels');
                $streets = session()->get('streets');
    
                //$user = new User();
    
                $health_units = $user->health_units();
                //dd($health_units);
                $address = new Address();
                $list_country = $address->list_country();
    
    
                //$health_units_categorys = $user->health_units_categorys();
                //dd($professional);
                $list_county = $address->list_county($professional['country_id'], $professional['province_id']);
                
                if ($professional['country_id'] == 6) {
                    $list_provinces = $address->list_provinces(6);
                }else {
                    $list_provinces = $address->list_provinces($professional['country_id']);
                }
                //dd($professional['country_id']);
    
    
                $medical_record = new MedicalRecord();
                $medical_areas = $medical_record->list_medical_areas();
                //dd($medical_areas);
    
                $userAuth = session()->get('userAuth');
                
            } catch (\Exception $e) {
                //dd($e);
                $professional = [];
                $health_units = [];
                $especialtys = [];
                $category_health_units = [];
                $clinical_states = [];
                $languages = [];
                $academic_levels = [];
                $streets = [];
                $list_country = [];
                //$health_units_categorys = ['subOrganics'=>[]];
                $list_provinces = [];
                $list_county = [];
                $medical_areas = [];
                $userAuth = null;
                $medical_areas = ["areas"=>[]];
            }
           //dd($professional);
            return view('management.profile', [
                'user'=> $userAuth,
                "category_health_units"=>$category_health_units,
                "health_units"=>$health_units,
                "streets"=>$streets,
                "especialtys"=>$especialtys,
                "clinical_states"=>$clinical_states,
                "languages"=>$languages,
                "academic_levels"=>$academic_levels,
                //"professionals"=>$professionals,
                "list_country"=>$list_country,
                "list_provinces"=>$list_provinces,
                "list_county"=>$list_county,
                "medical_areas"=>$medical_areas,
            ]);
        }else {
            try {
                $user = new User();
                $address = new Address();
                dd($userAuth);
                //$health_unit = $user->getHealthUnit(Crypt::decryptString($id));
                $health_units_categorys = $user->health_units_categorys();
                $list_country = $address->list_country();
                $list_county = $address->list_county($user['country_id'], $user['province_id']);
    
                if ($user['country_id'] == 6) {
                    $list_provinces = $address->list_provinces(6);
                }else {
                    $list_provinces = $address->list_provinces($user['country_id']);
                }
    
                //dd($health_unit);
            } catch (\Exception $e) {
    
                $health_units_categorys = ['subOrganics'=>[]];
                $list_provinces = [];
                $list_country = [];
                $list_county = [];
            }
            
            return view('management.my_profile', [
                'user'=>$userAuth,
                'health_units_categorys'=> $health_units_categorys['subOrganics'],
                'list_country'=> $list_country,
                'list_provinces'=> $list_provinces,
                'list_county'=> $list_county,
            ]);
        }
        
    }

    public function index(){
        
        //dd(session()->get('userAuth'));
        //dd(session()->get('especialtys')==null);
        if(/*session()->get('especialtys') ==null
         && */session()->get('clinical_states') ==null
         && session()->get('languages') ==null
         //&& session()->get('category_health_units') ==null
         && session()->get('streets') ==null
         && session()->get('academic_levels') ==null
        ){


            try {
                $user = new User();
                $address = new Address();
                //$especialtys = $user->spacialitys();
                //$category_health_units = $user->category_health_units();
                $clinical_states = $user->clinical_states();
                $languages = $user->languages();
                $academic_levels = $user->academic_levels();
                //$streets = $address->streets();
                

                //session(["especialtys" => $especialtys['categorys']]);
                session(["clinical_states" => $clinical_states]);
                session(["languages" => $languages['languages']]);
                //session(["category_health_units"=>$category_health_units]);
                //session(["streets"=>$streets]);
                session(["academic_levels"=>$academic_levels]);

                //dd(session()->get('especialtys'));

            } catch (\Exception $e) {
                //session(["especialtys" => []]);
                session(["clinical_states" => []]);
                session(["languages" => []]);
                //session(["category_health_units"=>[]]);
                //session(["streets"=>[]]);
                session(["academic_levels"=>[]]);
                //dd("Falha");
                return view('management.dashboard');
            }
        }

        return view('management.dashboard');
    }

    public function patients(){
        try {
            $user = new User();
            $patients = $user->patients();
            
        } catch (\Exception $th) {
            $patients = [];
            
        }

        return view('management.users.patients',['patients'=>$patients]);
    }

    public function clinical_datas(Request $request){
        
        try {
            if ($request->patient_key == null) {
                $patient = [0=>[]];
                $patient_key = null;
            }else{
                $user = new User();
                $patient = $user->getPatient($request->patient_key);
                //dd($patient);
                $patient_key = $request->patient_key;
            }

            $medical_record = new MedicalRecord();
            $chronic_diseases = $medical_record->chronic_diseases();
            $surgerys = $medical_record->surgerys();
            $blood_groups = $medical_record->blood_groups();
            $allergies = $medical_record->allergies();

            $data_user = $medical_record->list_medical_record($patient[0]['user_id']);
            $clinical_data = $data_user['clinicalData'];
            //dd($clinical_data);
            //dd($clinical_data);
            $permition_key = $request->permition_key;
            
        } catch (\Exception $th) {
            $patient = [0=>[]];
            $chronic_diseases = ["ChronicDiseases"=>[]];
            $surgerys = ["Surgerys"=>[]];
            $blood_groups = ["bloodgroups"=>[]];
            $allergies = ["allergys"=>[]];
            $clinical_data = [0=>[]];
            $patient_key = null;
            $permition_key = null;
            //dd($th);
            
        }

        return view('management.clinical_datas',[
            'patient'=>$patient[0],
            'chronic_diseases'=>$chronic_diseases["ChronicDiseases"],
            'surgerys'=>$surgerys["Surgerys"],
            'blood_groups'=>$blood_groups["bloodgroups"],
            'allergies'=>$allergies["allergys"],
            'clinical_data'=>$clinical_data[0],
            'patient_key'=>$patient_key,
            'permition_key'=>$permition_key,
        ]);

        
    }

    public function register_clinical_datas(Request $request){
        $medical_record = new MedicalRecord();
        $status = $medical_record->create_clinical_datas($request);

        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Dados clínicos cadastrado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Dados clínicos não cadastrado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Dados clínicos não cadastrado! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function show_medical_area(){

        try {
            $medical_record = new MedicalRecord();

            $medical_areas = $medical_record->list_medical_areas();
        } catch (\Exception $e) {
            $medical_areas = ["areas"=>[]];
        }
        //dd($medical_areas);
        return view('management.medical_record.medical_area', [
            'medical_areas'=> $medical_areas["areas"],
        ]);
    }

    public function delete_medical_area($area_id){

        $user = new MedicalRecord();
        $status = $user->drop_medical_area($area_id);


        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Eliminado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Nao eliminado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Especialidade não eliminado!',
            ],400);
        }
    }

    public function register_medical_area(Request $request){

        $medical_record = new MedicalRecord();
        $status = $medical_record->create_medical_area($request);

        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Área médica cadastrada com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Área médica não cadastrada! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Área médica não cadastrada! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function edit_medical_area($area_id, Request $request){
        $medical_record = new MedicalRecord();
        $status = $medical_record->update_medical_area($area_id, $request);

        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Área médica editada com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Área médica não editada! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Área médica não editada! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function show_specialties(){

        try {
            $medical_record = new MedicalRecord();
            $specialties = $medical_record->specialties();

            $medical_areas = $medical_record->list_medical_areas();
        } catch (\Exception $e) {
            $specialties = ["categorys"=>[]];
            $medical_areas = ["areas"=>[]];
        }
        //dd($medical_areas);
        //dd($specialties);
        return view('management.specialties', [
            'specialties'=> $specialties["categorys"],
            'medical_areas'=> $medical_areas["areas"],
        ]);
    }

    public function register_specialtie(Request $request){

        $medical_record = new MedicalRecord();
        $status = $medical_record->create_specialtie($request);

        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Especialidade cadastrado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Especialidade não cadastrado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Especialidade não cadastrado! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function edit_specialtie($specialtie_id, Request $request){
        $medical_record = new MedicalRecord();
        $status = $medical_record->update_specialtie($specialtie_id, $request);

        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Especialidade editada com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Especialidade não editada! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Especialidade não editada! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function delete_specialtie($specialtie_id){

        $user = new MedicalRecord();
        $status = $user->drop_specialtie($specialtie_id);


        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Eliminado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Nao eliminado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Especialidade não eliminado!',
            ],400);
        }
    }

    public function specialties($area_id){

        try {
            $medical_record = new MedicalRecord();
            $list_specialties = $medical_record->list_specialties($area_id);

        } catch (\Exception $e) {
            $list_specialties = [];
        }

        return $list_specialties;
    }

    public function provinces($country_id) {
        $address = new Address();
        $list_provinces = $address->list_provinces($country_id);
        return $list_provinces;
    }

    public function countys($country_id, $province_id) {
        $address = new Address();
        $list_county = $address->list_county($country_id, $province_id);
        return $list_county;
    }

    public function health_unit_profile($id){
        try {
            $user = new User();
            $address = new Address();
            $health_unit = $user->getHealthUnit(Crypt::decryptString($id));
            $health_units_categorys = $user->health_units_categorys();
            $list_country = $address->list_country();
            $list_county = $address->list_county($health_unit[0]['country_id'], $health_unit[0]['province_id']);
            //dd($health_unit);
            if ($health_unit[0]['country_id'] == 6) {
                $list_provinces = $address->list_provinces(6);
            }else {
                $list_provinces = $address->list_provinces($health_unit[0]['country_id']);
            }

            //dd($health_unit);
        } catch (\Exception $e) {

            $health_unit = [0=>[]];
            $health_units_categorys = ['subOrganics'=>[]];
            $list_provinces = [];
            $list_country = [];
            $list_county = [];
        }

        //dd($clinicalData);
        return view('management.users.health_unit_profile', [
            'health_unit'=> $health_unit[0],
            'health_units_categorys'=> $health_units_categorys['subOrganics'],
            'list_country'=> $list_country,
            'list_provinces'=> $list_provinces,
            'list_county'=> $list_county,
        ]);
    }

    public function health_units(){

        try {
            $user = new User();
            $address = new Address();
            $health_units = $user->health_units();
            //dd($health_units);
            $health_units_categorys = $user->health_units_categorys();
            $streets = $address->streets();
            $list_country = $address->list_country();
            $list_provinces = $address->list_provinces(6);

        } catch (\Exception $th) {

            $health_units = [];
            $health_units_categorys = ['subOrganics'=>[]];
            $streets = [];
            $list_country = [];
            $list_provinces = [];

        }

        //dd($health_units_categorys);
        return view('management.users.health_units',[
            'health_units'=>$health_units,
            'health_units_categorys'=>$health_units_categorys['subOrganics'],
            'streets'=>$streets,
            'list_country'=>$list_country,
            'list_provinces'=>$list_provinces,
        ]);
    }

    /*public function pharmacies(){
        $user = new User;
        $list_pharmacies = $user->list_pharmacies();
        //dd($allergies);
        return view('management.users.pharmacies', ["list_pharmacies"=>$list_pharmacies]);
    }*/

    public function edit_health_unit(Request $request){
        //dd($request);
        $user = new User();
        $status = $user->update_health_unit($request);


        if ($status==200) {
            return redirect()->back()->with('success', 'Unidade Sanitária editada com sucesso!');

        }else if($status == 500) {
            return redirect()->back()->with('fail', 'Unidade Sanitária não editada! Tente novamente.');
        }else if($status == 410) {
            return redirect()->back()->with('fail', 'Esta unidade sanitária já existe!');

        }else {
            return redirect()->back()->with('fail', 'Unidade Sanitária não editada! Preencha os dados correctamente.');
        }

    }

    public function register_health_units(Request $request){
        //dd($request);
        $user = new User();
        $status = $user->create_health_units($request);


        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Unidade Sanitária cadastrado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Unidade Sanitária não cadastrado! Tente novamente.',
            ],500);
        }else if($status == 410) {
            return response()->json([
                'success' => false,
                'message' => 'Este utilizador já existe!',
            ],410);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Unidade Sanitária não cadastrado! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function users(){

        return view('management.users.general');
    }

    public function pharmaces(){
        try {
            $user = new User();
            $pharmaces = $user->pharmaces();
        } catch (\Exception $th) {
            $pharmaces = [];
        }

        //dd($pharmaces);
        return view('management.users.pharmaces', ['pharmaces' => $pharmaces]);
    }

    public function professionals (){
        /*if(session()->get('especialtys') ==null
         && session()->get('clinical_states') ==null
         && session()->get('languages') ==null
         && session()->get('category_health_units') ==null
         && session()->get('streets') ==null
         && session()->get('academic_levels') ==null
        ){

        }*/
        try {
            $especialtys = session()->get('especialtys');
            $category_health_units = session()->get('category_health_units');
            
            //dd($category_health_units);
            $clinical_states = session()->get('clinical_states');
            $languages = session()->get('languages');
            //dd($languages);
            $academic_levels = session()->get('academic_levels');
            $streets = session()->get('streets');

            $user = new User();
            $professionals = $user->list_professional();

            $health_units = $user->health_units();
            //dd($health_units);
            $address = new Address();
            $list_country = $address->list_country();

            $medical_record = new MedicalRecord();
            $medical_areas = $medical_record->list_medical_areas();
            //dd($medical_areas);

            $userAuth = session()->get('userAuth');
            
            /*dd($userAuth['role_id']);
            dd($userAuth['id']);*/
            

        } catch (\Exception $th) {
            $health_units = [];
            $especialtys = [];
            $category_health_units = [];
            $clinical_states = [];
            $languages = [];
            $academic_levels = [];
            $streets = [];
            $professionals = [];
            $list_country = [];
            $medical_areas = [];
            $userAuth = null;
            $medical_areas = ["areas"=>[]];
        }
        //dd($professionals);
        return view('management.users.professionals', [
            "category_health_units"=>$category_health_units,
            "health_units"=>$health_units,
            "streets"=>$streets,
            "especialtys"=>$especialtys,
            "clinical_states"=>$clinical_states,
            "languages"=>$languages,
            "academic_levels"=>$academic_levels,
            "professionals"=>$professionals,
            "list_country"=>$list_country,
            "userAuth"=>$userAuth,
            "medical_areas"=>$medical_areas,
        ]);
    }

    public function edit_professional($professional_id, Request $request){
        //dd($request);
        $user = new User();
        $status = $user->update_professional($professional_id, $request);


        if ($status==200) {
            return redirect()->back()->with('success', 'Profissional editado com sucesso!');

        }else if($status == 500) {
            return redirect()->back()->with('fail', 'Profissional não editado! Tente novamente.');
        }else if($status == 410) {
            return redirect()->back()->with('fail', 'Profissional já existe!');

        }else {
            return redirect()->back()->with('fail', 'Profissional não editado! Preencha os dados correctamente.');
        }

    }

    public function professional_profile($id){

        try {
            $user = new User();
            $professional = $user->getProfessional(Crypt::decryptString($id));

            $especialtys = session()->get('especialtys');
            $category_health_units = session()->get('category_health_units');
            
            //dd($category_health_units);
            $clinical_states = session()->get('clinical_states');
            $languages = session()->get('languages');
            //dd($languages);
            $academic_levels = session()->get('academic_levels');
            $streets = session()->get('streets');

            $user = new User();

            $health_units = $user->health_units();
            //dd($health_units);
            $address = new Address();
            $list_country = $address->list_country();


            //$health_units_categorys = $user->health_units_categorys();
            //dd($professional);
            $list_county = $address->list_county($professional['country_id'], $professional['province_id']);
            
            if ($professional['country_id'] == 6) {
                $list_provinces = $address->list_provinces(6);
            }else {
                $list_provinces = $address->list_provinces($professional['country_id']);
            }
            //dd($professional['country_id']);


            $medical_record = new MedicalRecord();
            $medical_areas = $medical_record->list_medical_areas();
            //dd($medical_areas);

            $userAuth = session()->get('userAuth');
            
        } catch (\Exception $e) {
            //dd($e);
            $professional = [];
            $health_units = [];
            $especialtys = [];
            $category_health_units = [];
            $clinical_states = [];
            $languages = [];
            $academic_levels = [];
            $streets = [];
            $list_country = [];
            //$health_units_categorys = ['subOrganics'=>[]];
            $list_provinces = [];
            $list_county = [];
            $medical_areas = [];
            $userAuth = null;
            $medical_areas = ["areas"=>[]];
        }
       //dd($professional);
        return view('management.profile', [
            'user'=> $professional,
            "category_health_units"=>$category_health_units,
            "health_units"=>$health_units,
            "streets"=>$streets,
            "especialtys"=>$especialtys,
            "clinical_states"=>$clinical_states,
            "languages"=>$languages,
            "academic_levels"=>$academic_levels,
            //"professionals"=>$professionals,
            "list_country"=>$list_country,
            "list_provinces"=>$list_provinces,
            "list_county"=>$list_county,
            "userAuth"=>$userAuth,
            "medical_areas"=>$medical_areas,
        ]);
    }

    public function register_professional(Request $request){
        //dd($request);
        $user = new User();
        $status = $user->create_professional($request);


        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Profissional cadastrado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Profissional não cadastrado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Profissional não cadastrado! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function delete_health_unit($unity_id){

        $user = new User();
        $status = $user->drop_health_unit($unity_id);


        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Eliminado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Nao eliminado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Unidade Sanitária não eliminado!',
            ],400);
        }
    }

    public function patient_profile($id){
        $user = new User();
        $user = $user->getPatient($id);
        $userData = $user['userAuth'];
        $clinicalData = $user['clinicalData'];
        $medicalHistory = $user['medicalHistory'];
        $prescriptions = $user['prescriptions'];
        $exams = $user['exams'];
        //dd($clinicalData);
        return view('management.users.patient_profile', [
            'user'=> $userData[0],
            'clinicalData'=> $clinicalData[0],
            //'medicalHistory'=> $medicalHistory[0],
            //'prescriptions'=> $prescriptions[0],
            //'exams'=> $exams[0],
        ]);
    }

    public function change_password(Request $request){
        //dd($request);
        $user = new User();
        $status = $user->update_password($request);

        if ($request->new_password != $request->renew_password ) {
            return response()->json([
                'success' => true,
                'message' => 'Senha não alterada! Preencha os dados da nova senha correctamente!',
            ],410);
        }
        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Senha alterada com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Senha não alterada! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Senha não alterada! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function change_image(Request $request){
        //dd($request);
        $user = new User();
        $status = $user->update_image($request);


        if ($status==200) {
            $userAuth = session()->get('userAuth');
            $img = $request->file('img');
            $userAuth['img'] = $img->getClientOriginalName();
            session()->put('userAuth', $userAuth);
            return response()->json([
                'success' => true,
                'message' => 'Imagem alterada com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Imagem não alterada! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Imagem não alterada! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function medical_consultation(){
        try {
            $user = new User;
            $data = $user->medical_consultation();

            session(['medical_consultation' => $data]);
        } catch (\Exception $th) {
            $data = [];
        }

        return view('management.medical_consultation',['consultations'=> $data]);
    }


    public function appointment_schedule(){
        try {
            $user = new User;
            $list_appointment_schedules = $user->list_appointment_schedules();
            //$data = $user->medical_consultation();
            $data = [];
            $medical_record = new MedicalRecord();
            $list_specialties = $medical_record->specialties();
        } catch (\Exception $th) {
            $list_appointment_schedules = [];
            $list_specialties = ['categorys'=>[]];
            $data = [];
        }
        //dd($list_appointment_schedules);
        return view('management.appointment_schedule',[
            'consultations'=> $data,
            'list_specialties'=> $list_specialties['categorys'],
            'list_appointment_schedules'=>$list_appointment_schedules,
        ]);
    }

    public function register_appointment_schedule(Request $request){

        //dd($request);
        $user = new User();
        $status = $user->create_appointment_schedule($request);
        

        if ($status==200) {
            return redirect()->back()->with('success', 'Agenda cadastrada com sucesso!');

        }else if($status == 500) {
            return redirect()->back()->with('fail', 'Agenda não cadastrada! Tente novamente.');
        }else {
            return redirect()->back()->with('fail', 'Agenda não cadastrada! Preencha os dados correctamente.');
            
        }
    }

    function edit_appointment_schedule(Request $request, $id){
        //dd($request);
        $user = new User();
        $status = $user->update_appointment_schedule($request, $id);
        

        if ($status==200) {
            return redirect()->back()->with('success', 'Agenda editada com sucesso!');

        }else if($status == 500) {
            return redirect()->back()->with('fail', 'Agenda não editada! Tente novamente.');
        }else {
            return redirect()->back()->with('fail', 'Agenda não editada! Preencha os dados correctamente.');
            
        }
    }

    function delete_appointment_schedule($id){
        //dd($request);
        $user = new User();
        $status = $user->drop_appointment_schedule($id);
        

        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Agenda eliminada com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Agenda não eliminada! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Agenda não eliminada! Tente novamente.',
            ],400);
        }

    }

    public function consultation($position){
        $medical_consultation = session()->get('medical_consultation');

        $data = $medical_consultation[$position];
        //$data = json_decode($data);
        dd($data);

        if (isset($medical_consultation)) {
            return response()->json([
                'success' => false,
                'message' => 'Dados encontrado!',
                'data' => $data,
            ],200);
        }
        //dd($data);

        return response()->json([
            'success' => false,
            'message' => 'Dados não encontrado!',
            'data' => [],
        ],500);
    }

    public function allergies(){

        try {
            $medical_record = new MedicalRecord;
            $allergies = $medical_record->allergies();

        } catch (\Exception $th) {
            $allergies = ['allergys'=>[]];
        }

        //dd($allergies);
        return view('management.medical_record.allergies', ["allergies"=>$allergies['allergys']]);
    }

    public function add_chronic(Request $request){

        $medical_record = new MedicalRecord;
        $status = $medical_record->create_chronic($request);

        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Doença crônica adicionado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Doença crônica não adicionado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Doença crônica não adicionado! Preencha os dados correctamente.',
            ],400);
        }

    }

    public function add_allergy(Request $request){
        $medical_record = new MedicalRecord;
        $status = $medical_record->create_allergy($request);
        //dd($blood_groups['bloodgroups']);
        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Alergia adicionado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Alergia não adicionado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Alergia não adicionado! Preencha os dados correctamente.',
            ],400);
        }

        //return view('management.medical_record.blood_group', ["bloodgroups"=>$blood_groups['bloodgroups']]);
    }

    public function blood_groups(){
        try {
            $medical_record = new MedicalRecord;
            $blood_groups = $medical_record->blood_groups();
        } catch (\Exception $e) {
            $blood_groups = ['bloodgroups'=>[]];
        }


        return view('management.medical_record.blood_group', ["bloodgroups"=>$blood_groups['bloodgroups']]);
    }

    public function medical_center(){
        try {
            $medical_record = new MedicalRecord();
            $medical_center = $medical_record->medical_center();

        } catch (\Exception $th) {
            $medical_center = [];
        }

        return view('management.users.medical_center', ["medical_center"=>$medical_center]);
    }

    public function medical_exams(){

        return view('management.medical_record.medical_exams');

    }

    public function medical_specialty(){

        try {
            $user = new User();
            $especialtys = $user->spacialitys();
            //$category_health_units = $user->category_health_units();

        } catch (\Exception $e) {
            $especialtys = [];
        }

        //dd($especialtys);

        return view('management.medical_record.medical_specialty', ["especialtys"=>$especialtys]);
    }

    public function prescriptions(){

        try {
            $medical_record = new MedicalRecord();
            $prescriptions = $medical_record->prescriptions();

        } catch (\Exception $e) {
            $prescriptions = [];
        }

        return view('management.medical_record.prescriptions', ["prescriptions"=>$prescriptions]);
    }

    
    public function medicines(){

        return view('management.medical_record.medicines');
    }

    public function chronic_diseases(){
        try {
            $medical_record = new MedicalRecord();
            $chronic_diseases = $medical_record->chronic_diseases();
        } catch (\Exception $e) {
            $chronic_diseases = ["ChronicDiseases"=>[]];
        }

        //dd($chronic_diseases);
        return view('management.medical_record.chronic_diseases', ["chronic_diseases" =>$chronic_diseases]);
    }

    public function news(){
        try {
            $informative_content = new InformativeContent();
            $news = $informative_content->news();

        } catch (\Exception $e) {
            $news = [];
        }

        //dd(phpinfo());
        return view('management.informative_content.news', ['news'=>$news]);
    }

    public function add_news(Request $request){
        $informative_content = new InformativeContent();
        $status = $informative_content->create_news($request);


        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Notícia adicionada com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Notícia não adicionada! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Notícia não adicionada! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function edit_news($news_id, Request $request){
        $informative_content = new InformativeContent();
        $status = $informative_content->update_news($news_id, $request);


        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Notícia editada com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Notícia não editada! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Notícia não editada! Preencha os dados correctamente.',
            ],400);
        }
    }

    public function delete_news($news_id){

        $info = new InformativeContent();
        $status = $info->drop_news($news_id);


        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'Eliminado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'Nao eliminado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Notícia nao eliminado!',
            ],400);
        }
    }

    public function faqs()
    {
        try {
            $informative_content = new InformativeContent();
            $faqs = $informative_content->faqs();
        } catch (\Exception $e) {
            $faqs = [];
        }

        return view('management.informative_content.faqs', ['faqs'=>$faqs]);
    }

    public function add_faq(Request $request){
        $informative_content = new InformativeContent();
        $status = $informative_content->create_faq($request);
        //dd($blood_groups['bloodgroups']);
        if ($status==200) {
            return response()->json([
                'success' => true,
                'message' => 'FAQ adicionado com sucesso!',
            ],200);
        }else if($status == 500) {
            return response()->json([
                'success' => false,
                'message' => 'FAQ não adicionado! Tente novamente.',
            ],500);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'FAQ não adicionado! Preencha os dados correctamente.',
            ],400);
        }

        //return view('management.medical_record.blood_group', ["bloodgroups"=>$blood_groups['bloodgroups']]);
    }

}
