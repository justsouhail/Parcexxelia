<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $Employes_tables = Employes::all();
        return view('history.index' ,  compact('Employes_tables'));
    }

    public function history_consult(Request $request){
        dd($request);
    }
}
