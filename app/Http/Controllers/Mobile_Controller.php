<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class Mobile_Controller extends Controller
{
    private function fetchData()
    {
        $Marque_tables=Marque::all();
        $Model_tables=DB::table('model')
        ->join('categorie', 'model.categorie_id', '=', 'categorie.id')
        ->where('categorie.Categorie_Nom', 'Mobile')
        ->select('model.*')
        ->get();

        return [
            'Marque_tables' => $Marque_tables,
            'Model_tables' => $Model_tables,
        ];
    }


    private function saveMobileData(Request $request, Mobile $Mobile , $cdt)
    {

        $Mobile->N°_de_serie = $request->N°_de_serie;
        $Mobile->Cout = $request->Cout;
        $Mobile->data_achat = $request->Date_Achat;
        $Mobile->Os = $request->Os;
        $Mobile->Stockage = $request->Stockage;
        $Mobile->taille_ecran = $request->taille_ecran;
        $Mobile->model_id = $request->Model;
        $Mobile->marque_id = $request->Marque;
        if ($request->Type === 'smartphone') {
            $Mobile->is_smartphone = true;
            $Mobile->is_tablet = false;
        } elseif ($request->Type === 'tablette') {
            $Mobile->is_smartphone = false;
            $Mobile->is_tablet = true;
        }
     if($cdt == 'save'){
        
        $Mobile->save();
     }else{
        $Mobile->update();
     }
    }

    private function deleteMobile($id)
    {
        
        
        $ordinateur = Mobile::findOrFail($id);
        $ordinateur->delete();
    }







    public function Mobiles(){
        $Mobiles = Mobile::all();

        return view('Mobiles.index_Mobile' ,compact('Mobiles') );
    }
    public function Mobiles_add(){
        $data = $this->fetchData();
        return view('Mobiles.create_Mobile',$data   );
    }

    public function addMobile_traitement(Request $request){
        try{

            $request->validate([    
            'Marque' => 'required'
            
            ]);
        
                $Mobile = new Mobile();
                       $this->saveMobileData($request, $Mobile , 'save');
                                             
                                             
                                                
        
         return redirect('/Materiel/Mobile' )->with('status' , 'L\'Mobile a bien été ajouté avec succes. ' );
                        }
                        catch (\Exception $e) {
                            return redirect('/add_mobile')
                            ->with('status', 'Une erreur est survenue lors de l\'ajout de l\'Mobile: ' . $e->getMessage())
                            ->with('error', true)
                                                ->withInput();                }
    }

    public function DeleteAll(Request $request){
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            $this->deleteMobile($id);
        }
        return redirect('/Materiel/Mobile')->with('status', 'Les Mobiles ont bien été supprimés avec succes.');

    }


    public function Mobile_info($id){
        $Mobile = Mobile::findOrFail($id);    
        return view('Mobiles.Mobile_info' , compact('Mobile'));    }

        public function Mobiles_update($id){
            $data = $this->fetchData();
            $Mobile = Mobile::findOrFail($id);
            return view('Mobiles.Mobiles_update' , $data ,compact('Mobile')  );
        }

        public function updateMobile_traitement(Request $request  , $id){
            $Mobile = Mobile::findOrFail($id);
            $this->saveMobileData($request, $Mobile , 'update');
            return redirect('/Materiel/Mobile/'.$id )->with('status' , 'L\'Mobile a bien été Modifié avec succes. ');

        }

        public  function Mobiles_delete($id){
                $Mobile = Mobile::findorfail($id);
               $Mobile->delete();
               return redirect('/Materiel/Mobile')->with('status' , 'L\'Mobile a bien été supprimé   avec succes. ');
        }

        public function Mobile_pdf($id)
        {
            $Mobile = Mobile::findOrFail($id);
        
            $pdf = PDF::loadView('Mobiles.pdf_Mobile', [
                'Mobile' => $Mobile,
            ])->setOptions(['defaultFont' => 'sans-serif']);
        
            // Set custom page size and margins
            $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
        
            return $pdf->stream();  
        }
}
