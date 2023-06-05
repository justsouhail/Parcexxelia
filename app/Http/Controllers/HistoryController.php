<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $Employes_tables = Employes::all();
        $route = '/Historique_du_materiel ';
        return view('history.index' ,  compact('Employes_tables' , 'route'));
    }

    public function history_consult(Request $request){
        dd($request);
    }
}
