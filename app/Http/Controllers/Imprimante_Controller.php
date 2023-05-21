<?php

namespace App\Http\Controllers;

use App\Models\Imprimante;
use App\Models\Marque;
use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Imprimante_Controller extends Controller
{

    private function fetchData()
    {
        $imprimantes =  Imprimante::all();
        $Marque_tables=Marque::all();
        $Model_tables=DB::table('model')
        ->join('categorie', 'model.categorie_id', '=', 'categorie.id')
        ->where('categorie.Categorie_Nom', 'Imprimante')
        ->select('model.*')
        ->get();

        return [
            'imprimantes' => $imprimantes,
            'Marque_tables' => $Marque_tables,
            'Model_tables' => $Model_tables,
        ];
    }


    private function saveImprimanteData(Request $request, Imprimante $Imprimante , $cdt)
    {
        $couleur = isset($request->Couleur) ? true : false;

        $Imprimante->N°_de_serie = $request->N°_de_serie;
        $Imprimante->Cout = $request->Cout;
        $Imprimante->Date_Achat = $request->Date_Achat;
        $Imprimante->Addresse_IP = $request->Adresse_IP;
        $Imprimante->Nb_cartouche = $request->Nb_cartouche;
        $Imprimante->Status = $request->Status;
        $Imprimante->Login = $request->Login;
        $Imprimante->mdp = $request->mdp;
        $Imprimante->type_Connextion = $request->type_connextion;
        $Imprimante->model_id = $request->Model;
        $Imprimante->marque_id = $request->Marque;
        $Imprimante->Couleur = $couleur;

     if($cdt == 'save'){
        
        $Imprimante->save();
     }else{
        $Imprimante->update();
     }
    }
    private function deleteImprimate($id)
    {
        
        
        $ordinateur = Imprimante::findOrFail($id);
        $ordinateur->delete();
    }







    public function imprimantes(){
        $imprimantes = Imprimante::all();
        return view('imprimantes.index_imprimate' ,compact('imprimantes') );
    }
    public function imprimantes_add(){
        $data = $this->fetchData();
        return view('imprimantes.create_imprimate',$data   );
    }

    public function addimprimante_traitement(Request $request){
        try{

        
                $imprimante = new Imprimante();
                       $this->saveImprimanteData($request, $imprimante , 'save');
                                             
                                             
                                                
        
         return redirect('/Materiel/imprimante' )->with('status' , 'L\'imprimante a bien été ajouté avec succes. ' );
                        }
                        catch (\Exception $e) {
                            return redirect('/add_imprimante')
                            ->with('status', 'Une erreur est survenue lors de l\'ajout de l\'imprimante: ' . $e->getMessage())
                            ->with('error', true)
                                                ->withInput();                }
    }

    public function DeleteAll(Request $request){
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            $this->deleteImprimate($id);
        }
        return redirect('/Materiel/imprimante')->with('status', 'Les imprimantes ont bien été supprimés avec succes.');

    }


    public function imprimante_info($id){
        $imprimante = Imprimante::findOrFail($id);      
        return view('imprimantes.imprimante_info' , compact('imprimante'));    }

        public function imprimantes_update($id){
            $data = $this->fetchData();
            $imprimante = Imprimante::findOrFail($id);
            return view('imprimantes.imprimantes_update' , $data ,compact('imprimante')  );
        }
}
