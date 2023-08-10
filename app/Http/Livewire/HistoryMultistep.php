<?php

namespace App\Http\Livewire;
use PDF;
use App\Models\Categorie;
use App\Models\Historique;
use App\Models\Historique_fixe;
use App\Models\historique_imprimante;
use App\Models\historique_mobile;
use App\Models\Imprimante;
use App\Models\Mobile;
use App\Models\Ordinateur;
use App\Models\Tel_fixe;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HistoryMultistep extends Component
{    public $Categorie= '';
    public $materiel= '';

    public $totalsteps = 3;
    public $currentStep = 1;

    public function render()
    {
       
        $data1=[];
        $history = [];
        $tag = '';

        $categorie_tables = Categorie::whereIn('Categorie_Nom', ['ordinateur', 'Tel_Fixe', 'imprimante', 'mobile'])->get();
        $ord_id = Categorie::where('Categorie_Nom', 'Ordinateur')->value('id');
        $print_id = Categorie::where('Categorie_Nom', 'Imprimante')->value('id');
        $mobile_id = Categorie::where('Categorie_Nom', 'Mobile')->value('id');
        $Fixe_id = Categorie::where('Categorie_Nom', 'Tel_Fixe')->value('id');

        $selectedCategorie = $this->Categorie;

    
        if ($selectedCategorie == $ord_id) {

            $data1 = Ordinateur::all();

            $selectedOrdinateurId = $this->materiel;
            $history = Historique::where('ordinateur_id', $selectedOrdinateurId)->get();
            $tag = 'Ordinateurs';
        }
            
        

        
        elseif($selectedCategorie == $print_id){
            $data1 = Imprimante::all();
            $selectedImprimanteId = $this->materiel; 

            $history = historique_imprimante::where('imprimante_id', $selectedImprimanteId)->get();



                  $tag = 'Imprimantes';
        }
        elseif($selectedCategorie == $mobile_id){
            $data1 = Mobile::all();
            $selectedMobileId = $this->materiel; 

            $history = historique_mobile::where('mobile_id', $selectedMobileId)->get();



                  $tag = 'Appareil Mobile';
        }
        elseif($selectedCategorie == $Fixe_id){
            $data1 = Tel_fixe::all();
            $selectedFixeId = $this->materiel; 

            $history = Historique_fixe::where('tel_fixe_id', $selectedFixeId)->get();



                  $tag = 'Telephone Fixe';
        }        
        return view('livewire.history-multistep' , [
            'categorie_tables' => $categorie_tables,
            'data1' => $data1 , 
            'history' => $history, 
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
     


    public function history(){
        
        $this->resetErrorBag();
      
        $ord_id = Categorie::where('Categorie_Nom', 'Ordinateur')->value('id');
        $print_id = Categorie::where('Categorie_Nom', 'Imprimante')->value('id');
        $mobile_id = Categorie::where('Categorie_Nom', 'Mobile')->value('id');
        $Fixe_id = Categorie::where('Categorie_Nom', 'Tel_Fixe')->value('id');

        $selectedCategorie = $this->Categorie;

        if ($selectedCategorie == $ord_id) {
            $selectedOrdinateurId = $this->materiel;

            $history = Historique::where('ordinateur_id', $selectedOrdinateurId)->get();
            $tag = "Ordinateur";

                 
          }
        
        elseif($selectedCategorie == $print_id){
            $selectedImprimanteId = $this->materiel;
            $history = historique_imprimante::where('imprimante_id', $selectedImprimanteId)->get();
          $tag = "Imprimante";

        }
        elseif($selectedCategorie == $mobile_id){
  $selectedMobileId = $this->materiel;
            $history = historique_mobile::where('mobile_id', $selectedMobileId)->get();
          $tag = "Appareil Mobile";  
             }
             elseif($selectedCategorie == $Fixe_id){
                $selectedFixeId = $this->materiel;
                          $history = Historique_fixe::where('tel_fixe_id', $selectedFixeId)->get();
                        $tag = "Telephone Fixe";  
                           }



            $pdf = PDF::loadView('export.history_pdf', [
                'history' => $history,

                'tag' =>$tag,   
               
            ])->setOptions(['defaultFont' => 'sans-serif' , 
            'isRemoteEnabled' => true   ]);
            
            $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
      

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'historique.pdf');
            
            
    }

}

