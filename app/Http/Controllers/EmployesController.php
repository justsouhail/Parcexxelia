<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collective\Html\FormFacade as Form;
use App\Models\Employes;
class EmployesController extends Controller
{
    public function index() {
        $employes =  Employes::all();
           
        return view('Employes' , compact('employes'));
    }

    public function addEmployes_traitement(Request $request){

       

            $request->validate([
                'Nom' => 'required' ,
                'Prenom' => 'required' ,
                'CIN' => 'required' ,
            ]);
         

            $employes = new Employes();
       
            $employes->Nom = $request->Nom;
            $employes->Prenom = $request->Prenom;
            $employes->CIN = $request->CIN;
            
            $employes->save();

            
                return redirect('/Employes')->with('status' , 'L\'utilisateur a bien été ajouté avec succes. ');

          
            

        
    }

    public function display_employe_info($id){
        $employe = Employes::findOrFail($id);
      
        // return the view and the post
       return view('employes.employe_info' , compact('employe'));
    }
    public function updateEmployes_traitement(Request $request , $id){


        $request->validate([
            'Nom' => 'required' ,
            'Prenom' => 'required' ,
            'CIN' => 'required' ,
        ]);
     

        $employe = Employes::findOrFail($id);
   
        $employe->Nom = $request->Nom;
        $employe->Prenom = $request->Prenom;
        $employe->CIN = $request->CIN;
        
        $employe->update();

        
            return redirect('/Employes/'.$id)->with('status' , 'L\'utilisateur a bien été Modifié avec succes. ');

      ;
        
    }
    public function deleteEmployes_traitement($id){


        $employe = Employes::findOrFail($id);
           
        $employe->delete();

       return redirect('/Employes/')->with('status' , 'L\'utilisateur a bien été supprimé avec succes. ');

      ;
        
    }

}
