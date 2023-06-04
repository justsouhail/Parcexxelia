<?php
namespace App\Http\Controllers;
use PDF;
use App\Models\Employes;
use App\Models\Historique;
use App\Models\Ordinateur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\Auth;

class AffectationController extends Controller
{
    public function index(){
        $Employes_tables = Employes::all();
        $route = '/Affectation_Materiel ';
        return view('affectation.index' ,  compact('Employes_tables' , 'route'));
    }

    
    public function affectation(Request $request){
      try{
        $ordinateur = Ordinateur::where('N°_de_serie', $request->N°_de_serie)->first();


        $request->validate([
            'N°_de_serie' => 'required|exists:ordinateur,N°_de_serie',
            'emp' => 'required|unique:historique,employes_id,NULL,id,ordinateur_id,' . $ordinateur->id
        ], [
            'N°_de_serie.exists' => 'N° de serie que vous avez entrez n\'existe pas ',
            'emp.required' => 'The employee field is required.',
            'emp.unique' => 'Vous avez dejá affectez ce materiel au meme utlisateur'

        ]);
        
                $employe = Employes::where('id', $request->emp)->first();
                $historique = new Historique();
                $historique->ordinateur_id = $ordinateur->id;
                $historique->employes_id = $request->emp;
                $historique->date_affectation = date('Y-m-d');
                $historique->save();
                $user = Auth::user();

                $pdf = PDF::loadView('export.affectation_pdf', [
                    'ordinateur' => $ordinateur,
                    'user' => $user,
                    'employe' => $employe,
                  
                ])->setOptions(['defaultFont' => 'sans-serif' , 
                'isRemoteEnabled' => true   ]);
                
                $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
          

                return $pdf->download();
      }catch(\Exception $e) {
        return redirect('/Affectation')
        ->with('status', 'Une erreur est survenue lors de l\'affectation: ' . $e->getMessage())
        ->with('error', true);
    }
        
    }
 }
