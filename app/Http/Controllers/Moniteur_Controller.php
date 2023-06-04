<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Marque;
use App\Models\Moniteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Moniteur_Controller extends Controller
{
    private function fetchData()
    {
        $Marque_tables=Marque::all();
        $Model_tables=DB::table('model')
        ->join('categorie', 'model.categorie_id', '=', 'categorie.id')
        ->where('categorie.Categorie_Nom', 'Moniteur')
        ->select('model.*')
        ->get();
            return [
            'Marque_tables' => $Marque_tables,
            'Model_tables' => $Model_tables,
        ];
    }


    private function saveMoniteurData(Request $request, Moniteur $Moniteur , $cdt)
    {
        $couleur = isset($request->Couleur) ? true : false;

        $Moniteur->N°_de_serie = $request->N°_de_serie;
        $Moniteur->Cout = $request->Cout;
        $Moniteur->Data_achat = $request->Date_Achat;
        $Moniteur->resolution = $request->resolution;
        $Moniteur->model_id = $request->Model;
        $Moniteur->marque_id = $request->Marque;

     if($cdt == 'save'){
        
        $Moniteur->save();
     }else{
        $Moniteur->update();
     }
    }
    private function deleteMoniteur($id)
    {
        
        
        $Moniteur = Moniteur::findOrFail($id);
        $Moniteur->delete();
    }





    public function moniteurs(){
        $route = '/Materiel/Moniteur/Liste' ;
        $moniteurs = Moniteur::all();
        // dd($moniteurs[0]->ordinateur->Marque->Marque_Nom);
        return view('moniteurs.index' , compact('moniteurs', 'route'));
    }

    public function DeleteAll(Request $request){
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            $this->deleteMoniteur($id);
        }
        return redirect('/Materiel/Moniteur')->with('status', 'Les Moniteurs ont bien été supprimés avec succes.');
    }

    







   







    public function Moniteurs_add(){
        $route = '/Materiel/Moniteur/Ajout' ;
        $data = $this->fetchData();
        
        return view('Moniteurs.create_moniteur',$data , compact('route')  );
    }

    public function addMoniteur_traitement(Request $request){
        try{

            $request->validate([    
            'Marque' => 'required'
            
            ]);
        
                $Moniteur = new Moniteur();
                       $this->saveMoniteurData($request, $Moniteur , 'save');
                                             
                                             
                                                
        
         return redirect('/Materiel/Moniteur' )->with('status' , 'L\'Moniteur a bien été ajouté avec succes. ' );
                        }
                        catch (\Exception $e) {
                            return redirect('/add_moniteurs')
                            ->with('status', 'Une erreur est survenue lors de l\'ajout de l\'Moniteur: ' . $e->getMessage())
                            ->with('error', true)
                                                ->withInput();                }
    }



    public function Moniteur_info($id){
        $route = '/Materiel/Moniteur/Details' ;
        $Moniteur = Moniteur::findOrFail($id);    
        // dd($Moniteur->ordinateur)  ;
        return view('Moniteurs.Moniteur_info' , compact('Moniteur' , 'route'));    }

        public function Moniteurs_update($id){
            $route = '/Materiel/Moniteur/Mise_a_jour' ;
            $data = $this->fetchData();
            $Moniteur = Moniteur::findOrFail($id);
            return view('Moniteurs.Moniteurs_update' , $data ,compact('Moniteur' , 'route')  );
        }

        public function updateMoniteur_traitement(Request $request  , $id){
            $Moniteur = Moniteur::findOrFail($id);
            $this->saveMoniteurData($request, $Moniteur , 'update');
            return redirect('/Materiel/Moniteur/'.$id )->with('status' , 'L\'Moniteur a bien été Modifié avec succes. ');

        }

        public  function Moniteurs_delete($id){
                $Moniteur = Moniteur::findorfail($id);
               $Moniteur->delete();
               return redirect('/Materiel/Moniteur')->with('status' , 'L\'Moniteur a bien été supprimé   avec succes. ');
        }

        public function Moniteur_pdf($id)
        {
            $Moniteur = Moniteur::findOrFail($id);
        
            $pdf = PDF::loadView('Moniteurs.pdf_Moniteur', [
                'Moniteur' => $Moniteur,
            ])->setOptions(['defaultFont' => 'sans-serif']);
        
            // Set custom page size and margins
            $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
        
            return $pdf->stream();  
        }
}
