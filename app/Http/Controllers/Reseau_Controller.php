<?php

namespace App\Http\Controllers;

use App\Models\Imprimante;
use App\Models\Marque;
use App\Models\Mobile;
use App\Models\Reseau;
use App\Models\Ordinateur;
use App\Models\Tel_fixe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF ;
class Reseau_Controller extends Controller
{
    private function fetchData()
    {
        $Marque_tables=Marque::all();
        $Model_tables=DB::table('model')
        ->join('categorie', 'model.categorie_id', '=', 'categorie.id')
        ->where('categorie.Categorie_Nom', 'Reseau')
        ->select('model.*')
        ->get();
            return [
            'Marque_tables' => $Marque_tables,
            'Model_tables' => $Model_tables,
        ];
    }


    private function saveReseauData(Request $request, Reseau $Reseau , $cdt)
    {
        $Reseau->N°_de_serie = $request->N°_de_serie;
        $Reseau->Nom = $request->Nom;
        $Reseau->Addresse_MAC = $request->Addresse_MAC;
        $Reseau->Localisation = $request->Localisation;
        $Reseau->Conf_Details = $request->Conf_Details;
        $Reseau->Addresse_IP = $request->Addresse_IP;
        $Reseau->model_id = $request->Model;
        $Reseau->marque_id = $request->Marque;

     if($cdt == 'save'){
        
        $Reseau->save();
     }else{
        $Reseau->update();
     }
    }
    private function deleteReseau($id)
    {
        
        
        $Reseau = Reseau::findOrFail($id);
        $Reseau->delete();
    }





    public function index(){
        $route = '/Materiel/Reseau/Liste' ;
        $Reseaus = Reseau::all();
        // dd($Reseaus[0]->ordinateur->Marque->Marque_Nom);
        return view('Reseau.index' , compact('Reseaus', 'route'));
    }

    public function DeleteAll(Request $request){
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            $this->deleteReseau($id);
        }
        return redirect('/Materiel/Reseau')->with('status', 'Les Reseaus ont bien été supprimés avec succes.');
    }

    







   







    public function Reseaus_add(){
        $route = '/Materiel/Reseau/Ajout' ;
        $data = $this->fetchData();
        
        return view('Reseau.create_Reseau',$data , compact('route')  );
    }

    public function addReseau_traitement(Request $request){
        try{

            $request->validate([    
            'Marque' => 'required'
            
            ]);
        
                $Reseau = new Reseau();
                       $this->saveReseauData($request, $Reseau , 'save');
                                             
                                             
                                                
        
         return redirect('/Materiel/Reseau' )->with('status' , 'Materiel reseau a bien été ajouté avec succes. ' );
                        }
                        catch (\Exception $e) {
                            return redirect('/add_Reseau')
                            ->with('status', 'Une erreur est survenue lors de l\'ajout de Materiel reseau: ' . $e->getMessage())
                            ->with('error', true)
                                                ->withInput();                }
    }



    public function Reseau_info($id){
        $route = '/Materiel/Reseau/Details' ;
        $Reseau = Reseau::findOrFail($id);    
        // dd($Reseau->ordinateur)  ;
        return view('Reseau.Reseau_info' , compact('Reseau' , 'route'));    }

        public function Reseaus_update($id){
            $route = '/Materiel/Reseau/Mise_a_jour' ;
            $data = $this->fetchData();
            $Reseau = Reseau::findOrFail($id);
            return view('Reseau.Reseaus_update' , $data ,compact('Reseau' , 'route')  );
        }

        public function updateReseau_traitement(Request $request  , $id){
            $Reseau = Reseau::findOrFail($id);
            $this->saveReseauData($request, $Reseau , 'update');
            return redirect('/Materiel/Reseau/'.$id )->with('status' , 'Materiel reseau a bien été Modifié avec succes. ');

        }

        public  function Reseaus_delete($id){
                $Reseau = Reseau::findorfail($id);
               $Reseau->delete();
               return redirect('/Materiel/Reseau')->with('status' , 'Materiel reseau a bien été supprimé   avec succes. ');
        }

        public function Reseau_pdf($id)
        {
            $Reseau = Reseau::findOrFail($id);
        
            $pdf = PDF::loadView('Reseau.pdf_Reseau', [
                'Reseau' => $Reseau,
            ])->setOptions(['defaultFont' => 'sans-serif']);
        
            // Set custom page size and margins
            $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
        
            return $pdf->stream();  
        }
}
