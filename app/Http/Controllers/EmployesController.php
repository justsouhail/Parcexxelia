<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collective\Html\FormFacade as Form;
use App\Models\Employes;
use App\Models\Service;

class EmployesController extends Controller
{
    public function index() {
        $employes =  Employes::all();
        $services_tables = Service::all();
        return view('Employes', compact('employes', 'services_tables'));
    }

    public function addEmployes_traitement(Request $request){
        $request->validate([
            'Nom' => 'required' ,
            'Prenom' => 'required' ,
            'CIN' => 'required' ,
            'Service' => 'required' ,
        ]);
      



            $employes = new Employes();
             $employes->Nom = $request->Nom;
            $employes->Prenom = $request->Prenom;
            $employes->CIN = $request->CIN;


            $employes->service_id = $request->Service;

            $employes->save();

            
                return redirect('/Employes' )->with('status' , 'L\'utilisateur a bien été ajouté avec succes. ' );

          
            

        
    }

    public function display_employe_info($id){
        $employe = Employes::findOrFail($id);
        if(count($employe->Ordinateur) > 0){
            $data= true;
        }
else{
    $data= false;
}
        $services_tables = Service::all();

// dd($employe->Ordinateur[0]->antivirus[0]->Antivirus_Nom);
       return view('employes.employe_info' , compact('employe' , 'services_tables' , 'data'));
    }
    public function updateEmployes_traitement(Request $request , $id){
        $services_tables = Service::all();
        


        $request->validate([
            'Nom' => 'required' ,
            'Prenom' => 'required' ,
            'CIN' => 'required' ,
            'Service' => 'required' ,
        ]);
     
        $employe = Employes::findOrFail($id);
   
        $employe->Nom = $request->Nom;
        $employe->Prenom = $request->Prenom;
        $employe->CIN = $request->CIN;
        $employe->service_id = $request->Service;

  
        $employe->update();

        
            return redirect('/Employes/'.$id )->with('status' , 'L\'utilisateur a bien été Modifié avec succes. ');

      ;
        
    }
    public function deleteEmployes_traitement($id){


        $employe = Employes::findOrFail($id);
           
        $employe->delete();

       return redirect('/Employes/')->with('status' , 'L\'utilisateur a bien été supprimé avec succes. ');

      
        
    }

}
