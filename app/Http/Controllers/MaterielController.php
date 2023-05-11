<?php

namespace App\Http\Controllers;

use App\Models\Antivirus;
use App\Models\Employes;
use App\Models\Logiciel;
use App\Models\Marque;
use App\Models\Models;
use App\Models\Moniteur;
use App\Models\Ordinateur;
use App\Models\Os;
use App\Models\Post;
use App\Models\Processeur;
use App\Models\Role;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    public function index(){

    
    return view('materiel.index');
    }

    public function ordinateurs(){
        $ordinateur =  Ordinateur::all();
        $Roles_tables=Role::all();
        $services_tables = Service::all();
        $Employes_tables=Employes::all();
        $Type_tables=Type::all();
        $Marque_tables=Marque::all();
        $Processeur_tables=Processeur::all();
        $Model_tables=Models::all();
        $Os_tables=Os::all();
        $Post_tables=Post::all();
        $Antivirus_tables=Antivirus::all();
        $logiciel_tables=Logiciel::all();
        $Moniteur_tables = Moniteur::whereNull('ordinateur_id')->get();
      
        return view('materiel.ordinateurs' , compact('ordinateur' ,'Roles_tables' ,'services_tables' , 'Employes_tables', 
                                                      'Type_tables' ,  'Marque_tables' ,  'Processeur_tables' , 'Model_tables' ,'Os_tables' , 
                                                      'Post_tables' , 'Antivirus_tables' ,  'logiciel_tables' , 'Moniteur_tables') );

    }

    public function addOrdinateur_traitement(Request $request   ){

        
try{

        
        $request->validate([
          'Role' => 'required' ,
          'Type' => 'required' ,
          'Marque' => 'required' ,
          'Model' => 'required' ,
          'N°_de_serie' => 'required|unique:ordinateur|min:5|max:10' ,
          'Nom' => 'required|min:3|max:30' ,                    
          'RAM' => 'required|numeric|min:1',
          'Stockage' => 'required|numeric|min:1' ,
          'Processeur' => 'required' ,
          'Os' => 'required' ,
          'Nombre_de_moniteur' => 'required|numeric|min:0' ,
          'Adresse_MAC' => 'required|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/' ,
          'Adresse_IP' => 'required|ip' ,
          'Post' => 'required' ,
          
          
        ]);
               
        $ordinateur = new Ordinateur();
        $ordinateur->N°_de_serie = $request->N°_de_serie;
        $ordinateur->Cout = $request->Cout;

        $ordinateur->Date_Achat = $request->Date_Achat;

        $ordinateur->RAM = $request->RAM;

        $ordinateur->Stockage = $request->Stockage;
        $ordinateur->Nom = $request->Nom;
        $ordinateur->Addresse_MAC = $request->Adresse_MAC;
                $ordinateur->Addresse_IP = $request->Adresse_IP;
                $ordinateur->Nb_Moniteur = $request->Nombre_de_moniteur;

                $ordinateur->Status = $request->Status;

                $ordinateur->service_id = $request->Service;

                $ordinateur->model_id = $request->Model;

                $ordinateur->processeur_id = $request->Processeur;

                        $ordinateur->os_id = $request->Os;

                                $ordinateur->type_id = $request->Type;

                                        $ordinateur->role_id = $request->Role;
                                        $ordinateur->marque_id = $request->Marque;

                                        $ordinateur->post_id = $request->Post;
                                        $ordinateur->employes_id = $request->Employes;


                                       
                                        $ordinateur->save();
                                        $Moniteur = Moniteur::findOrFail($request->Moniteur);
                                        $Moniteur->ordinateur_id=$request->Moniteur;
                                        $Moniteur->update();
                                
                                        $selectedAntivirusIds = explode(',', $request->input('Antivirus')[0]);
                                        if (!empty($selectedAntivirusIds) && !in_array('', $selectedAntivirusIds)) {
                                            $ordinateur->antivirus()->sync($selectedAntivirusIds);
                                            
                                        }
                                        $selectedLogicileIds = explode(',', $request->input('Logiciel')[0]);
                                        if (!empty($selectedLogicileIds) && !in_array('', $selectedLogicileIds)) {
                                            $ordinateur->logiciel()->sync($selectedLogicileIds);
                                            
                                        }
                                     
                                        
                                        

                                        return redirect('/Materiel/ordinateurs' )->with('status' , 'L\'ordinateur a bien été ajouté avec succes. ' );
                }
                catch (\Exception $e) {
                    return redirect('/Materiel/ordinateurs')
                    ->with('status', 'Une erreur est survenue lors de l\'ajout de l\'ordinateur: ' . $e->getMessage())
                    ->with('error', true)
                                        ->withInput();                }

      
    }

    public function ordinateurs_info($id){
        $ordinateur = Ordinateur::findOrFail($id);
        $Moniteur_tables = Moniteur::where('ordinateur_id', $id)->get();
                         
        return view('materiel.ordinateurs_info' , compact('ordinateur' , 'Moniteur_tables'));
    }

    
}

