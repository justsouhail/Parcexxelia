<?php

namespace App\Http\Controllers;

use App\Models\Imprimante;
use App\Models\Marque;
use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class Imprimante_Controller extends Controller
{

    private function fetchData()
    {
        $Marque_tables=Marque::all();
        $Model_tables=DB::table('model')
        ->join('categorie', 'model.categorie_id', '=', 'categorie.id')
        ->where('categorie.Categorie_Nom', 'Imprimante')
        ->select('model.*')
        ->get();

        return [
            'Marque_tables' => $Marque_tables,
            'Model_tables' => $Model_tables,
        ];
    }


    private function saveImprimanteData(Request $request, Imprimante $Imprimante , $cdt)
    {
        // dd($request);
        $couleur = isset($request->Couleur) ? true : false;
        $Scanner = isset($request->is_scanner) ? true : false;

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
        $Imprimante->is_scanner = $Scanner;


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
        $route = '/Materiel/Imprimante/Liste ';

        return view('imprimantes.index_imprimate' ,compact('imprimantes' , 'route') );
    }
    public function imprimantes_add(){
        $data = $this->fetchData();
        $route = '/Materiel/Imprimante/Ajout ';

        return view('imprimantes.create_imprimate',$data  , compact('route') );
    }

    public function addimprimante_traitement(Request $request){
        try{

            $request->validate([    
            'Marque' => 'required'
            
            ]);
        
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
        $route = '/Materiel/Imprimante/Details ';
 
        return view('imprimantes.imprimante_info' , compact('imprimante' , 'route'));    }

        public function imprimantes_update($id){
            $data = $this->fetchData();
            $imprimante = Imprimante::findOrFail($id);
            $route = '/Materiel/Imprimante/Mise_a_jour ';

            return view('imprimantes.imprimantes_update' , $data ,compact('imprimante' , 'route')  );
        }

        public function updateImprimante_traitement(Request $request  , $id){
            $Imprimante = Imprimante::findOrFail($id);
            $this->saveImprimanteData($request, $Imprimante , 'update');
            return redirect('/Materiel/imprimante/'.$id )->with('status' , 'L\'imprimante a bien été Modifié avec succes. ');

        }

        public  function imprimantes_delete($id){
                $imprimante = Imprimante::findorfail($id);
               $imprimante->delete();
               return redirect('/Materiel/imprimante')->with('status' , 'L\'imprimante a bien été supprimé   avec succes. ');
        }

        public function imprimante_pdf($id)
        {
            $Imprimante = Imprimante::findOrFail($id);
        
            $pdf = PDF::loadView('imprimantes.pdf_imprimante', [
                'Imprimante' => $Imprimante,
            ])->setOptions(['defaultFont' => 'sans-serif']);
        
            // Set custom page size and margins
            $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
        
            return $pdf->stream();  
        }
}
