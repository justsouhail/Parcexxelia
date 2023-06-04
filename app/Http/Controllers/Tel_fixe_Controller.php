<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Tel_fixe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF ;
class Tel_fixe_Controller extends Controller
{
  
    private function fetchData()
    {
        $Marque_tables=Marque::all();
        $Model_tables=DB::table('model')
        ->join('categorie', 'model.categorie_id', '=', 'categorie.id')
        ->where('categorie.Categorie_Nom', 'Tel_Fixe')
        ->select('model.*')
        ->get();

        return [
            'Marque_tables' => $Marque_tables,
            'Model_tables' => $Model_tables,
        ];
    }


    private function saveFixeData(Request $request, Tel_fixe $Fixe , $cdt)
    {

        $Fixe->N°_de_serie = $request->N°_de_serie;
        $Fixe->Cout = $request->Cout;
        $Fixe->Date_Achat = $request->Date_Achat;
        $Fixe->Date_Installation = $request->Date_Installation;
        $Fixe->astreinte = $request->astreinte;
        $Fixe->Autorisation = $request->Autorisation;


        $Fixe->Addresse_IP = $request->Adresse_IP;
        $Fixe->Commentaire = $request->Commentaire;
        $Fixe->model_id = $request->Model;
        $Fixe->marque_id = $request->Marque;
   
        
     if($cdt == 'save'){
        
        $Fixe->save();
     }else{
        $Fixe->update();
     }
    }

    private function deleteFixe($id)
    {
        
        
        $ordinateur = Tel_fixe::findOrFail($id);
        $ordinateur->delete();
    }




    public function Fixe(){
        $fixe = Tel_fixe::all();
        $route = '/Materiel/Telephone_fixe/Liste ';

        return view('fixe.index' , compact('fixe' , 'route')); 
    }

    public function DeleteAll(Request $request){
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            $this->deleteFixe($id);
        }
        return redirect('/Materiel/Tel_fixe')->with('status', 'Les telephones fixes ont bien été supprimés avec succes.');

    }



    public function Fixes_add(){
        $data = $this->fetchData();
        $route = '/Materiel/Telephone_fixe/Ajout ';

        return view('fixe.create_Fixe',$data  ,  compact('route')  );
    }


    public function addFixe_traitement(Request $request){
        try{

            $request->validate([    
            'Marque' => 'required'
            
            ]);
        
                $Fixe = new Tel_fixe();
                       $this->saveFixeData($request, $Fixe , 'save');
                                             
                                             
                                                
        
         return redirect('/Materiel/Tel_fixe' )->with('status' , 'Le telephone fixe a bien été ajouté avec succes. ' );
                        }
                        catch (\Exception $e) {
                            return redirect('/add_fixe')
                            ->with('status', 'Une erreur est survenue lors de l\'ajout de  telephone fixe: ' . $e->getMessage())
                            ->with('error', true)
                                                ->withInput();                }
    }

   


    public function Fixe_info($id){
        $Fixe = Tel_fixe::findOrFail($id); 
        $route = '/Materiel/Telephone_fixe/Details ';
        return view('fixe.Fixe_info' , compact('Fixe' , 'route'));    }

        public function Fixe_update($id){
            $data = $this->fetchData();
            $Fixe = Tel_fixe::findOrFail($id);
            $route = '/Materiel/Telephone_fixe/Mise_a_jour ';

            return view('fixe.fixe_update' , $data ,compact('Fixe' , 'route')  );
        }

        public function updateFixe_traitement(Request $request  , $id){
            $Fixe = Tel_fixe::findOrFail($id);
            $this->saveFixeData($request, $Fixe , 'update');
            return redirect('/Materiel/Fixe/'.$id )->with('status' , 'Le telephone fixe a bien été Modifié avec succes. ');

        }

        public  function Fixe_delete($id){
                $Fixe = Tel_fixe::findorfail($id);
               $Fixe->delete();
               return redirect('/Materiel/Tel_fixe')->with('status' , 'Le telephone fixe a bien été supprimé   avec succes. ');
        }

        public function Fixe_pdf($id)
        {   
            $Fixe = Tel_fixe::findOrFail($id);
        
            $pdf = PDF::loadView('fixe.pdf_Fixe', [
                'Fixe' => $Fixe,
            ])->setOptions(['defaultFont' => 'sans-serif']);
        
            // Set custom page size and margins
            $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
        
            return $pdf->stream();  
        }
      
    
}

   


