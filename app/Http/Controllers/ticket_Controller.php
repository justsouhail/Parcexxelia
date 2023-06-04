<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ticket_Controller extends Controller
{
    private function fetchData()
    {
        $Marque_tables=Marque::all();
        $Model_tables=DB::table('model')
        ->join('categorie', 'model.categorie_id', '=', 'categorie.id')
        ->where('categorie.Categorie_Nom', 'Ticketerie')
        ->select('model.*')
        ->get();
            return [
            'Marque_tables' => $Marque_tables,
            'Model_tables' => $Model_tables,
        ];
    }


    private function saveticketData(Request $request, ticket $ticket , $cdt)
    {
        $ticket->N°_de_serie = $request->N°_de_serie;
        $ticket->Addresse_IP = $request->Addresse_IP;
        $ticket->model_id = $request->Model;
        $ticket->marque_id = $request->Marque;

     if($cdt == 'save'){
        
        $ticket->save();
     }else{
        $ticket->update();
     }
    }
    private function deleteticket($id)
    {
        
        
        $ticket = ticket::findOrFail($id);
        $ticket->delete();
    }





    public function index(){
        $route = '/Materiel/ticket/Liste' ;
        $ticket = ticket::all();
        // dd($tickets[0]->ordinateur->Marque->Marque_Nom);
        return view('ticket.index' , compact('ticket', 'route'));
    }

    public function DeleteAll(Request $request){
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            $this->deleteticket($id);
        }
        return redirect('/Materiel/ticket')->with('status', 'Les tickets ont bien été supprimés avec succes.');
    }

    







   







    public function tickets_add(){
        $route = '/Materiel/ticket/Ajout' ;
        $data = $this->fetchData();
        
        return view('ticket.create_ticket',$data , compact('route')  );
    }

    public function addticket_traitement(Request $request){
        try{

            $request->validate([    
            'Marque' => 'required'
            
            ]);
        
                $ticket = new ticket();
                       $this->saveticketData($request, $ticket , 'save');
                                             
                                             
                                                
        
         return redirect('/Materiel/ticket' )->with('status' , 'Distributeur de ticket a bien été ajouté avec succes. ' );
                        }
                        catch (\Exception $e) {
                            return redirect('/add_ticket')
                            ->with('status', 'Une erreur est survenue lors de l\'ajout de Distributeur de ticket : ' . $e->getMessage())
                            ->with('error', true)
                                                ->withInput();                }
    }



    public function ticket_info($id){
        $route = '/Materiel/ticket/Details' ;
        $ticket = ticket::findOrFail($id);    
        // dd($ticket->ordinateur)  ;
        return view('ticket.ticket_info' , compact('ticket' , 'route'));    }

        public function ticket_update($id){
            $route = '/Materiel/ticket/Mise_a_jour' ;
            $data = $this->fetchData();
            $ticket = ticket::findOrFail($id);
            return view('ticket.tickets_update' , $data ,compact('ticket' , 'route')  );
        }

        public function updateticket_traitement(Request $request  , $id){
            $ticket = ticket::findOrFail($id);
            $this->saveticketData($request, $ticket , 'update');
            return redirect('/Materiel/ticket/'.$id )->with('status' , 'Distributeur de ticket a bien été Modifié avec succes. ');

        }

        public  function ticket_delete($id){
                $ticket = ticket::findorfail($id);
               $ticket->delete();
               return redirect('/Materiel/ticket')->with('status' , 'Distributeur de ticket a bien été supprimé   avec succes. ');
        }

        public function ticket_pdf($id)
        {
            $ticket = ticket::findOrFail($id);
        
            $pdf = PDF::loadView('ticket.pdf_ticket', [
                'ticket' => $ticket,
            ])->setOptions(['defaultFont' => 'sans-serif']);
        
            // Set custom page size and margins
            $pdf->setPaper('A4', 'portrait')->setOptions(['margin_top' => 1, 'margin_bottom' => 1]);
        
            return $pdf->stream();  
        }
}
