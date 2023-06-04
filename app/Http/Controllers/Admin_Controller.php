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
use App\Models\Reseau;
use App\Models\Role;
use App\Models\Service;
use App\Models\Tel_fixe;
use App\Models\ticket;
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
        $user = Auth::user();

        if($user->is_admin){
            return redirect('/admin');

        }
        else{

            $route = '/Admin/Verification';

            return  view('admin.verify' , compact('route'));
        }
    }


    public function send(Request $request){
        $user = Auth::user();
        $password = $request->pswd;

        if (Hash::check($password, auth()->user()->password)) {
            $user->is_admin=1;
            $user->save();
            return redirect('/admin');
        }
        else{
            return back()->with('status' , 'Mot de passe incorrecte , Vous devez entrer mot de passe d\'authentification ');
        }
      
    }
    public function index()    {
        $user = Auth::user();

        if($user->is_admin){

            $route = '/Admin';
            return view('admin.index' , compact('user' , 'route'));}
            else {
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
        else  if($category == 'tel_fixes'){
            $tag='Telephone_Fixe';
            $columns = Schema::getColumnListing('tel_fixes');
                $data =  Tel_fixe::onlyTrashed()->get();
        }
        else  if($category == 'Reseau'){
            $tag='Reseau';
            $columns = Schema::getColumnListing('reseaus');
                $data =  Reseau::onlyTrashed()->get();
        }  
         else  if($category == 'ticket'){
            $tag='Distributeur de ticket';
            $columns = Schema::getColumnListing('tickets');
                $data =  ticket::onlyTrashed()->get();
        }
        
        
        
        
        $user = Auth::user();
        if($user->is_admin){

            $route = '/Admin/Sauvegarde';
            return view('admin.backup' , compact('columns' , 'data' , 'tag' , 'route'));
        }
            else {
               return redirect('/admin/verify');
            }
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
        else  if($category == 'Telephone_Fixe'){
            Tel_fixe::whereId($id)->restore();
        }
        else  if($category == 'Reseau'){
            Reseau::whereId($id)->restore();
        }
        else  if($category == 'ticket'){
            Reseau::whereId($id)->restore();
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
       
       $user = Auth::user();
       if($user->is_admin){

        $route = '/Admin/Parametre';

        return view('admin.parametre' , compact('data' , 'tag' , 'route'));
       }
           else {
              return redirect('/admin/verify');
           }
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