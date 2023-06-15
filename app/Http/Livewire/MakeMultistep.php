<?php

namespace App\Http\Livewire;
use PDF;
use App\Models\Categorie;
use App\Models\Employes;
use App\Models\Historique;
use App\Models\Historique_fixe;
use App\Models\historique_imprimante;
use App\Models\historique_mobile;
use App\Models\Imprimante;
use App\Models\Mobile;
use App\Models\Ordinateur;
use App\Models\Tel_fixe;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Routing\Redirector;

class MakeMultistep extends Component
{
    public $Categorie= '';
    public $materiel='';
    public $utilisateur='';

    public $totalsteps = 3;
    public $currentStep = 1;

  
    public function  mount(){
        $this->currentStep = 1 ;
    }

    public function render()
    {   
        $ord_id = Categorie::where('Categorie_Nom', 'Ordinateur')->value('id');
        $print_id = Categorie::where('Categorie_Nom', 'Imprimante')->value('id');
        $mob_id = Categorie::where('Categorie_Nom', 'Mobile')->value('id');
        $fix_id = Categorie::where('Categorie_Nom', 'Tel_Fixe')->value('id');
        $categorie_tables = Categorie::whereIn('Categorie_Nom', ['ordinateur', 'Tel_Fixe', 'imprimante', 'mobile'])->get();
        $selectedCategorie = $this->Categorie;
        $data1=[];
        $users = [];
        $tag = '';

            if ($selectedCategorie == $ord_id) {
                $data1 = Ordinateur::with('Marque', 'Model')
                    ->leftJoin('historique', 'ordinateur.id', '=', 'historique.ordinateur_id')
                    ->select('ordinateur.*')
                    ->whereNull('historique.ordinateur_id')
                    ->get();

                    $users =  DB::table('Employes')
                    ->leftJoin('historique', 'employes.id', '=', 'historique.employes_id')
                    ->select('employes.*')
                     ->whereNull('historique.employes_id')
                     ->orderBy('Nom') // Order by the 'Nom' column in ascending order
                      ->get();
                      $tag = 'Ordinateurs';
            }
            
        
            
        elseif($selectedCategorie == $print_id){
            $data1  = Imprimante::with('Marque')
            ->leftJoin('historique_imprimante', 'imprimante.id', '=', 'historique_imprimante.imprimante_id')
            ->select('imprimante.*')
            ->whereNull('historique_imprimante.imprimante_id')
            ->get();
            

            $users =  DB::table('Employes')
            ->leftJoin('historique_imprimante', 'employes.id', '=', 'historique_imprimante.employes_id')
            ->select('employes.*')
             ->whereNull('historique_imprimante.employes_id')
              ->get();
              $tag = 'Imprimantes';
        }
        elseif($selectedCategorie == $mob_id){
            $data1  = Mobile::with('Marque')
            ->leftJoin('historique_mobile', 'mobile.id', '=', 'historique_mobile.mobile_id')
            ->select('mobile.*')
            ->whereNull('historique_mobile.mobile_id')
            ->get();
            
            $users =  DB::table('Employes')
            ->leftJoin('historique_mobile', 'employes.id', '=', 'historique_mobile.employes_id')
            ->select('employes.*')
             ->whereNull('historique_mobile.employes_id')
              ->get();
              $tag = 'Appareil Mobile';
        }
        elseif($selectedCategorie == $fix_id){
            $data1  = Tel_fixe::with('Marque')
            ->leftJoin('historique_fixes', 'tel_fixes.id', '=', 'historique_fixes.tel_fixe_id')
            ->select('tel_fixes.*')
            ->whereNull('historique_fixes.tel_fixe_id')
            ->get();
            
            $users =  DB::table('Employes')
            ->leftJoin('historique_fixes', 'employes.id', '=', 'historique_fixes.employes_id')
            ->select('employes.*')
             ->whereNull('historique_fixes.employes_id')
              ->get();
              $tag = 'Telephone Fixe';
        }


       
       

        return view('livewire.make-multistep', [
            'categorie_tables' => $categorie_tables,
            'data1' => $data1,
            'users'  =>$users,
            'tag' => $tag,
        ]);  

      }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->validateData();
            $this->currentStep--;
            if($this->currentStep < 1){
                $this->currentStep = 1;
            }
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalsteps ){
            $this->currentStep = $this->totalsteps;
        }
    }

    public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'Categorie' => 'required'
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'materiel' => 'required'
            ]);
        }
     }
    


    public function attribution(){
        
        $this->resetErrorBag();
        if($this->currentStep == 3){
            $this->validate([
                'utilisateur' => 'required',

            ]);
        }

        $ord_id = Categorie::where('Categorie_Nom', 'Ordinateur')->value('id');
        $print_id = Categorie::where('Categorie_Nom', 'Imprimante')->value('id');
        $mob_id = Categorie::where('Categorie_Nom', 'Mobile')->value('id');
        $fix_id = Categorie::where('Categorie_Nom', 'Tel_Fixe')->value('id');

        $selectedCategorie = $this->Categorie;

        if ($selectedCategorie == $ord_id) {
            $historique = new Historique();
            $historique->ordinateur_id = $this->materiel;
            $historique->employes_id = $this->utilisateur;
            $historique->date_affectation = date('Y-m-d');
            $historique->save();
            $data2 = Ordinateur::where('id',$this->materiel)->first();
            $tag = "Ordinateur";

                 
          }
        
        elseif($selectedCategorie == $print_id){
          $historique   = new historique_imprimante();
          $historique->imprimante_id = $this->materiel;
          $historique->employes_id = $this->utilisateur;
          $historique->date_affectation = date('Y-m-d');
          $historique->save();
          $data2 = Imprimante::where('id',$this->materiel)->first();
          $tag = "Imprimante";

        }
        elseif($selectedCategorie == $mob_id){
            $historique   = new historique_mobile();
            $historique->mobile_id = $this->materiel;
            $historique->employes_id = $this->utilisateur;
            $historique->date_affectation = date('Y-m-d');
            $historique->save();
            $data2 = Mobile::where('id',$this->materiel)->first();
            $tag = ($data2->is_tablet) ? "Tablette" : (($data2->is_smartphone) ? "Smartphone" : "Appareil Mobile");

        }
        elseif($selectedCategorie == $fix_id){
            $historique   = new Historique_fixe();
            $historique->tel_fixe_id = $this->materiel;
            $historique->employes_id = $this->utilisateur;
            $historique->date_affectation = date('Y-m-d');
            $historique->save();
            $data2 = Tel_fixe::where('id',$this->materiel)->first();
            $tag = 'Telephone fixe';

        }

        $user = Auth::user();
            $employe = Employes::where('id',$this->utilisateur)->first();


            $pdf = PDF::loadView('export.affectation_pdf', [
                'data2' => $data2,
                'user' => $user,
                'employe' => $employe,
                'tag' =>$tag,   
               
            ])->setOptions(['defaultFont' => 'sans-serif' , 
            'isRemoteEnabled' => true   ]);
            
            $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'affectation.pdf');
   
    }
}
