<?php

namespace App\Http\Controllers;
use PDF;

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
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use App\Exports\OrdinateurExport;
use Maatwebsite\Excel\Facades\Excel;

class MaterielController extends Controller
{
    private function fetchData()
    {
        $ordinateur =  Ordinateur::all();
        $Roles_tables=Role::all();
        $Employes_tables=Employes::all();
        $Type_tables=Type::all();
        $Marque_tables=Marque::all();
        $Processeur_tables=Processeur::all();
        $Model_tables=Models::all();
        $Os_tables=Os::all();
        $Post_tables=Post::all();
        $Antivirus_tables=Antivirus::all();
        $logiciel_tables=Logiciel::all();

        return [
            'ordinateur' => $ordinateur,
            'Roles_tables' => $Roles_tables,
            'Employes_tables' => $Employes_tables,
            'Type_tables' => $Type_tables,
            'Marque_tables' => $Marque_tables,
            'Processeur_tables' => $Processeur_tables,
            'Model_tables' => $Model_tables,
            'Os_tables' => $Os_tables,
            'Post_tables' => $Post_tables,
            'Antivirus_tables' => $Antivirus_tables,
            'logiciel_tables' => $logiciel_tables,
        ];
    }
    private function validateData(Request $request)
    {
        $request->validate([    
            
            
        ]);
    }
    private function saveOrdinateurData(Request $request, Ordinateur $ordinateur , $cdt)
    {
        $ordinateur->N°_de_serie = $request->N°_de_serie;
        $ordinateur->Cout = $request->Cout;
        $ordinateur->Date_Achat = $request->Date_Achat;
        $ordinateur->RAM = $request->RAM;
        $ordinateur->Stockage = $request->Stockage;
        $ordinateur->Nom = $request->Nom;
        $ordinateur->Addresse_MAC = $request->Adresse_MAC;
        $ordinateur->Addresse_IP = $request->Adresse_IP;
        $ordinateur->Nb_Moniteur = $request->Nombre_de_moniteur;
        $ordinateur->Commentaire = $request->Status;
        $ordinateur->model_id = $request->Model;
        $ordinateur->processeur_id = $request->Processeur;
        $ordinateur->os_id = $request->Os;
        $ordinateur->type_id = $request->Type;
        $ordinateur->role_id = $request->Role;
        $ordinateur->marque_id = $request->Marque;
        $ordinateur->post_id = $request->Post;
        $ordinateur->categorie_id = 1;
     if($cdt == 'save'){
        
        $ordinateur->save();
     }else{
        $ordinateur->update();
     }
    }
    private function deleteOrdinateur($id)
    {
        $moniteurs = Moniteur::where('ordinateur_id', $id)->get();
        
        foreach ($moniteurs as $moniteur) {
            $moniteur->ordinateur_id = null;
            $moniteur->save();
        }
        
        $ordinateur = Ordinateur::findOrFail($id);
        $ordinateur->delete();
    }
    







   





    public function index(){

    
    return view('materiel.index');
    }

    public function ordinateurs(){
        $ordinateur =  Ordinateur::all();
        return view('materiel.ordinateurs'  , compact('ordinateur') );

    }




    public function addOrdinateur_traitement(Request $request   ){

        
try{

    $this->validateData($request);

        $ordinateur = new Ordinateur();
               $this->saveOrdinateurData($request, $ordinateur , 'save');
                                        $Moniteur = Moniteur::find($request->Moniteur);
                                        if($Moniteur){
                                            $Moniteur->ordinateur_id=$ordinateur->id;
                                            $Moniteur->save();
                                        }
                                        
                                
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
                    return redirect('/add')
                    ->with('status', 'Une erreur est survenue lors de l\'ajout de l\'ordinateur: ' . $e->getMessage())
                    ->with('error', true)
                                        ->withInput();                }

      
    }

    public function ordinateurs_info($id){
        $ordinateur = Ordinateur::findOrFail($id);
        $Moniteur_tables = Moniteur::where('ordinateur_id', $id)->get();
                         
        return view('materiel.ordinateurs_info' , compact('ordinateur' , 'Moniteur_tables'));
    }

    public function ordinateurs_update($id){
        $data = $this->fetchData();
        $Moniteur_tables = Moniteur::whereNull('ordinateur_id')->get();
        $ordinateurs = Ordinateur::findOrFail($id);
        return view('materiel.ordinateurs_update' , $data ,compact('ordinateurs' , 'Moniteur_tables')  );
    }
    public function updateOrdinateur_traitement(Request $request , $id){
        $this->validateData($request);
        $ordinateur = Ordinateur::findOrFail($id);
        $this->saveOrdinateurData($request, $ordinateur , 'update');
        $Moniteur = Moniteur::find($request->Moniteur);
        if($Moniteur){
            $Moniteur->ordinateur_id=$ordinateur->id;
            $Moniteur->save();
        }
        

        $selectedAntivirusIds = explode(',', $request->input('Antivirus')[0]);
        if (!empty($selectedAntivirusIds) && !in_array('', $selectedAntivirusIds)) {
            $ordinateur->antivirus()->sync($selectedAntivirusIds);   
        }

        $selectedLogicileIds = explode(',', $request->input('Logiciel')[0]);
        if (!empty($selectedLogicileIds) && !in_array('', $selectedLogicileIds)) {
            $ordinateur->logiciel()->sync($selectedLogicileIds);
            
        } 
       return redirect('/Materiel/Ordinateur/'.$id )->with('status' , 'L\'ordinateur a bien été Modifié avec succes. ');


    }
    public function ordinateurs_delete($id){
       $this->deleteOrdinateur($id);
        return redirect('/Materiel/ordinateurs')->with('status' , 'L\'ordinateur a bien été supprimé avec succes. ');

    }
    public function ordinateurs_pdf($id)
    {
        $ordinateur = Ordinateur::findOrFail($id);
        $Moniteur_tables = Moniteur::where('ordinateur_id', $id)->get();
    
        $pdf = PDF::loadView('materiel.pdf_ordinateus', [
            'ordinateur' => $ordinateur,
            'Moniteur_tables' => $Moniteur_tables,
        ])->setOptions(['defaultFont' => 'sans-serif']);
    
        // Set custom page size and margins
        $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
    
        return $pdf->stream();  
    }

    public function DeleteAll(Request $request){
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            $this->deleteOrdinateur($id);
        }
        return redirect('/Materiel/ordinateurs')->with('status', 'Les ordinateurs ont bien été supprimés avec succes.');

    }

    public function ordinateurs_add(){
        $data = $this->fetchData();

     
        $Moniteur_tables = Moniteur::whereNull('ordinateur_id')->get();
      if($Moniteur_tables){
        $check = true;
      }
      else{
        $check=false;
      }   
           return view('materiel.create_ordinateur' ,$data  , compact('Moniteur_tables') );
    }

    public function ordinateurs_excel(Request $request){
        $ordinateurIds = $request->input('ids'); 
        $ordinateurData = Ordinateur::whereIn('id', $ordinateurIds)->get();
        $response =  Excel::download(new OrdinateurExport($ordinateurData) , 'ordinateurs.xlsx' );
        ob_end_clean();
        return $response;

    }

  
}

