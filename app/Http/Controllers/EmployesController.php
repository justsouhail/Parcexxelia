<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collective\Html\FormFacade as Form;
use App\Models\Employes;
use App\Models\Historique;
use App\Models\Ordinateur;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

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

        $services_tables = Service::all();
        $historique = DB::table('historique')
        ->join('ordinateur', 'ordinateur.id', '=', 'historique.ordinateur_id')
        ->join('marque', 'marque.id', '=', 'ordinateur.marque_id')
        ->join('model', 'model.id', '=', 'ordinateur.model_id')
        ->where('historique.employes_id', $id)
        ->select('historique.*', 'ordinateur.*', 'marque.Marque_Nom', 'model.Model_Nom')
        ->get();

        $historique_imprimante = DB::table('historique_imprimante')
        ->join('imprimante', 'historique_imprimante.imprimante_id', '=', 'imprimante.id')
        ->join('marque', 'imprimante.marque_id', '=', 'marque.id')
        ->join('model', 'imprimante.model_id', '=', 'model.id')
        ->where('historique_imprimante.employes_id', $id)
        ->select('historique_imprimante.*', 'imprimante.*', 'marque.Marque_Nom', 'model.Model_Nom')
        ->get();
    
   

                       return view('employes.employe_info' , compact('employe' , 'services_tables' , 'historique'  , 'historique_imprimante'));
    }
    public function updateEmployes_traitement(Request $request , $id){
    
        


        $request->validate([
            'Nom' => 'required' ,
            'Prenom' => 'required' ,
           
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
    public function updateEmployes($id){
        $employe = Employes::findOrFail($id);
        $services_tables = Service::all();
        return view('employes.update_user' , compact('employe' ,'services_tables' ));
    }
    public function deleteEmployes_traitement($id){

        $employe = Employes::findOrFail($id);

        $employe->delete();

       return redirect('/Employes/')->with('status' , 'L\'utilisateur a bien été supprimé avec succes. ');
   
    }

}
