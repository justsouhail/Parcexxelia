<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Imprimante;
use App\Models\Marque;
use App\Models\Mobile;
use App\Models\Moniteur;
use App\Models\Ordinateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $count_ord = Ordinateur::count();
        $count_imprimante = Imprimante::count();
        $count_moniteurs = Moniteur::count();
        $count_mobile = Mobile::count();

        $cate = Categorie::count();
        $marque = Marque::count();
        $total = $count_ord +  $count_imprimante + $count_moniteurs +  $count_mobile ;


        $result = DB::table('services')
        ->join('employes', 'services.id', '=', 'employes.service_id')
        ->select(DB::raw('COUNT(employes.id) as employee_count'), 'services.Nom', 'services.id')
        ->groupBy('services.id', 'services.Nom')
        ->get();

        $services = "";
        foreach ($result as $service) {
            $services .= "['" . $service->Nom . "', " . $service->employee_count . "],";
        }

        $result_2 = DB::table('ordinateur')
        ->join('model', 'ordinateur.model_id', '=', 'model.ID')
        ->select(DB::raw('COUNT(ordinateur.model_id) as model_count'), 'model.Model_Nom')
        ->groupBy('ordinateur.model_id', 'model.Model_Nom')
        ->get();
        $models = "";
        foreach ($result_2 as $md) {
            $models .= "['" . $md->Model_Nom . "', " . $md->model_count . "],";
        }
                
        
        return view('Dashboard' , compact('count_ord' , 'count_imprimante' , 'count_moniteurs' , 'count_mobile' , 'services' , 'models' , 'cate' , 'marque' , 'total'));
    }
}
