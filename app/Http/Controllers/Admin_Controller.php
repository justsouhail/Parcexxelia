<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Antivirus;
use App\Models\Categorie;
use App\Models\Employes;
use App\Models\Imprimante;
use App\Models\Logiciel;
use App\Models\Marque;
use App\Models\Mobile;
use App\Models\Moniteur;
use App\Models\Ordinateur;
use App\Models\Os;
use App\Models\Post;
use App\Models\Role;
use App\Models\Service;
use App\Models\verifytoken;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use PDO;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class Admin_Controller extends Controller
{  
    public function  VerifyView(){

            return  view('admin.verify');
    }

    public function send(Request $request){
        
        $validToken = rand(10,100..'2022');
        
        $get_token=new verifytoken();
        $get_token->token=$validToken;
        $get_token->email=$request->email;
        $get_token->save();
        $get_user_email = $request->email;
        $get_user_name = 'admin';
        
        Mail::send('admin.mailmessage' ,['token' => $validToken] , function($message){
            $message->to('souhailaroud09@gmail.com' , 'online')->subject('sujet');
        });
    }
    
    public function index()    {

        $user = Auth::user();
        if($user->is_admin){
            return view('admin.index' , compact('user'));
        }
    else{
        return redirect('/admin/verify');
    }
        
    }


    public function backupView(Request $request){
        $category = $request->query('category');
            
        if($category == 'Utilisateurs'){
            $tag='Utilisateurs';
            $columns = Schema::getColumnListing('employes');
                $data =  Employes::onlyTrashed()->get();
                

        }
       else  if($category == 'Ordinateurs'){
            $tag='Ordinateurs';
            $columns = Schema::getColumnListing('ordinateur');
                $data =  Ordinateur::onlyTrashed()->get();
        }
        else  if($category == 'Mobile'){
            $tag='Mobile';
            $columns = Schema::getColumnListing('mobile');
                $data =  Mobile::onlyTrashed()->get();
        }
        
        else  if($category == 'Imprimantes'){
            $tag='Imprimantes';
            $columns = Schema::getColumnListing('imprimante');
                $data =  Imprimante::onlyTrashed()->get();
        }
        
        else  if($category == 'Moniteurs'){
            $tag='Moniteurs';
            $columns = Schema::getColumnListing('moniteur');
                $data =  Moniteur::onlyTrashed()->get();
        }
        
        
        // dd($columns);

        return view('admin.backup' , compact('columns' , 'data' , 'tag'));
    }


    public function adminRestoreOne(Request $request, $id){
        $category = $request->query('category');
        if($category == 'Utilisateurs'){
            Employes::whereId($id)->restore();
        }
        else  if($category == 'Ordinateurs'){
            Ordinateur::whereId($id)->restore();
        }
        else  if($category == 'Mobile'){
            Mobile::whereId($id)->restore();
        }
        else  if($category == 'Imprimantes'){
            Imprimante::whereId($id)->restore();
        }
        else  if($category == 'Moniteurs'){
            Moniteur::whereId($id)->restore();
        }

        return back();
    }

    public function parametreView(Request $request){
        	$data = [];
       $para   = $request->query('Param');
       if($para == 'Services'){
        $tag = 'Services';
            $result = Service::all();
            foreach ($result as $res) {
                $data[] = [
                    'id' => $res->id,
                    'name' => $res->Nom,
                ];
            }
       }
       else if($para == 'Categories'){
        $tag = 'Categories';
        $result = Categorie::all();
        foreach ($result as $res) {
            $data[] = [
                'id' => $res->id,
                'name' => $res->Categorie_Nom,
            ];
        }
       }
       else if($para == 'Marque'){
        $tag = 'Marque';
        $result = Marque::all();
        foreach ($result as $res) {
            $data[] = [
                'id' => $res->id,
                'name' => $res->Marque_Nom,
            ];
        }
        
       }
       else if($para == 'Os'){
        $tag = 'Os';
        $result = Os::all();
        foreach ($result as $res) {
            $data[] = [
                'id' => $res->id,
                'name' => $res->Os_Nom,
            ];
        }
       }
       else if($para == 'Antivirus'){
        $tag = 'Antivirus';
        $result = Antivirus::all();
        foreach ($result as $res) {
            $data[] = [
                'id' => $res->id,
                'name' => $res->Antivirus_Nom,
            ];
        }
       }
       else if($para == 'Logiciel'){
        $tag = 'Logiciel';
        $result = Logiciel::all();
        foreach ($result as $res) {
            $data[] = [
                'id' => $res->id,
                'name' => $res->Logiciel_Nom,
            ];
        }
       }
       else if($para == 'Post'){
        $tag = 'Post';
        $result = Post::all();
        foreach ($result as $res) {
            $data[] = [
                'id' => $res->id,
                'name' => $res->Post_Nom,
            ];
        }
       }
       else if($para == 'Role'){
        $tag = 'Role';
        $result = Role::all();
        foreach ($result as $res) {
            $data[] = [
                'id' => $res->id,
                'name' => $res->Role_Nom,
            ];
        }
       }
       
        return view('admin.parametre' , compact('data' , 'tag'));
    }


    





    public function Paramupdate(Request $request){
        
        $para   = $request->query('Param');
            $services = $request->input('services');
           foreach ($services as $serviceId => $serviceName) {
            // Get the service ID based on the index (assuming the order is preserved)
            $id = $serviceId;
            $name = $serviceName;
            if($para == 'Services'){

                                    // Find the service by ID
                                    $existingService = Service::find($id);
                                        // if($name){

                                        
                                            $existingService->Nom =  $name;
                                            $existingService->update();
                                        // }
                                $newservices = $request->input('newservices');
                                if (isset($newservices)) {

                                foreach ($newservices as $ser) {
                                    // Create a new  model instance and set the name
                                    $newService = new Service;
                                    $newService->Nom = $ser;
                                    $newService->save();
                                }
                                }
       }
       else if($para == 'Role') {
           
        $services = $request->input('services');
       foreach ($services as $serviceId => $serviceName) {
        // Get the service ID based on the index (assuming the order is preserved)
        $id = $serviceId;
        $name = $serviceName;
            
            // Find the service by ID
            $existingService = Role::find($id);
                // if($name){

                
                    $existingService->Role_Nom =  $name;
                    $existingService->update();
                // }
        }
        $newservices = $request->input('newservices');
        if (isset($newservices)) {

        foreach ($newservices as $ser) {
            // Create a new  model instance and set the name
            $newService = new Role();
            $newService->Role_Nom = $ser;
            $newService->save();
        }
        }
   }

       else if($para == 'Logiciel') {
           
        $services = $request->input('services');
       foreach ($services as $serviceId => $serviceName) {
        // Get the service ID based on the index (assuming the order is preserved)
        $id = $serviceId;
        $name = $serviceName;
            
            // Find the service by ID
            $existingService = Logiciel::find($id);
                // if($name){

                
                    $existingService->Logiciel_Nom =  $name;
                    $existingService->update();
                // }
        }
        $newservices = $request->input('newservices');
        if (isset($newservices)) {

        foreach ($newservices as $ser) {
            // Create a new  model instance and set the name
            $newService = new Logiciel();
            $newService->Logiciel_Nom = $ser;
            $newService->save();
        }
        }
   }

   else if($para == 'Post') {
           
    $services = $request->input('services');
   foreach ($services as $serviceId => $serviceName) {
    // Get the service ID based on the index (assuming the order is preserved)
    $id = $serviceId;
    $name = $serviceName;
        
        // Find the service by ID
        $existingService = Post::find($id);
            // if($name){

            
                $existingService->Post_Nom =  $name;
                $existingService->update();
            // }
    }
    $newservices = $request->input('newservices');
    if (isset($newservices)) {

    foreach ($newservices as $ser) {
        // Create a new  model instance and set the name
        $newService = new Post();
        $newService->Post_Nom = $ser;
        $newService->save();
    }
    }
}
      else if($para == 'Categories') {
           
        $services = $request->input('services');
       foreach ($services as $serviceId => $serviceName) {
        // Get the service ID based on the index (assuming the order is preserved)
        $id = $serviceId;
        $name = $serviceName;
            
            // Find the service by ID
            $existingService = Categorie::find($id);
                // if($name){

                
                    $existingService->Categorie_Nom =  $name;
                    $existingService->update();
                // }
        }
        $newservices = $request->input('newservices');
        if (isset($newservices)) {

        foreach ($newservices as $ser) {
            // Create a new  model instance and set the name
            $newService = new Categorie();
            $newService->Categorie_Nom = $ser;
            $newService->save();
        }
        }
   }
   else if($para == 'Marque') {
           
    $services = $request->input('services');
   foreach ($services as $serviceId => $serviceName) {
    // Get the service ID based on the index (assuming the order is preserved)
    $id = $serviceId;
    $name = $serviceName;
        
        // Find the service by ID
        $existingService = Marque::find($id);
            // if($name){

            
                $existingService->Marque_Nom =  $name;
                $existingService->update();
            // }
    }
    $newservices = $request->input('newservices');
    if (isset($newservices)) {

    foreach ($newservices as $ser) {
        // Create a new  model instance and set the name
        $newService = new Marque();
        $newService->Marque_Nom = $ser;
        $newService->save();
    }
    }
}
else if($para == 'Os') {
           
    $services = $request->input('services');
   foreach ($services as $serviceId => $serviceName) {
    // Get the service ID based on the index (assuming the order is preserved)
    $id = $serviceId;
    $name = $serviceName;
        
        // Find the service by ID
        $existingService = Os::find($id);
            // if($name){

            
                $existingService->Os_Nom =  $name;
                $existingService->update();
            // }
    }
    $newservices = $request->input('newservices');
    if (isset($newservices)) {

    foreach ($newservices as $ser) {
        // Create a new  model instance and set the name
        $newService = new Os();
        $newService->Os_Nom = $ser;
        $newService->save();
    }
    }
}
else if($para == 'Antivirus') {
           
    $services = $request->input('services');
   foreach ($services as $serviceId => $serviceName) {
    // Get the service ID based on the index (assuming the order is preserved)
    $id = $serviceId;
    $name = $serviceName;
        
        // Find the service by ID
        $existingService = Antivirus::find($id);
            // if($name){

            
                $existingService->Antivirus_Nom =  $name;
                $existingService->update();
            // }
    }
    $newservices = $request->input('newservices');
    if (isset($newservices)) {

    foreach ($newservices as $ser) {
        // Create a new  model instance and set the name
        $newService = new Antivirus();
        $newService->Antivirus_Nom = $ser;
        $newService->save();
    }
    }
}
       return redirect()->back()->with('status', 'Modification avec succes');



           }



 
   
}

public function adminupdate(Request $request){
    $user = Auth::user();
    $user->Nom = $request->Nom;
    $user->Prenom = $request->Prenom;
    $user->Branche_Societe = $request->Branche_Societe;
    $user->email = $request->email;

    if($request->mdp){
        $user->password= Hash::make($request->mdp);
    }

    $user->update();
    return redirect('/admin')->with('status' , 'Les données sont  modifiés avec succes. ' );


    
}
}