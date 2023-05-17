@extends('layouts.app')


    @section('content')

    @push('css')
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0A5E4F;
  color: white;
}
</style>
   


     @endpush
     <body>
     <div class="logo">
              <h1>
                <span ><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/favicon-exxelia.png'))) }}" alt="" style="width: 39px; height: 39px; " id="img-logo" ></span>
                 <span style="color: black; ">ParcInfo &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <span style="font-size: 1.4rem;">EXXELIA MAROC  </span> 
            </h1>
            </div>

  <div style="text-align: center; margin-top: 0;">
    <h2 style=" margin-bottom: 2rem; color: #08473C;"><u>Fiche descriptive</u></h2>
  </div>
  <div>





  <table id="customers" style="margin-top: -10px;">
<thead>
    <tr>
      <th>Nom d'ordinateur</th>
      <td>{{$ordinateur->Nom}}</td>
    </tr>
    <tr>
      <th>N°_de_serie</th>
      <td>{{$ordinateur->N°_de_serie}}</td>
    </tr>
    <tr>
      <th>Utilisateur</th>
      <td> @if (isset($ordinateur->employes) && $ordinateur->employes->isNotEmpty())
                                            {{$ordinateur->employes()->latest('date_affectation')->first()->Prenom}}&nbsp;{{$ordinateur->employes()->latest('date_affectation')->first()->Nom}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif</td>
    </tr>
    <tr>
      <th>Service</th>
      <td>{{$ordinateur->Service->Nom}} </td>
    </tr>
    <tr>
      <th>ROLE</th>
      <td>{{$ordinateur->Role->Role_Nom}}</td>
    </tr>
    <tr>
      <th>TYPE</th>
      <td>{{$ordinateur->Type->Type_Nom}}</td>
    </tr>
    <tr>
      <th>POST</th>
      <td>{{$ordinateur->Post->Post_Nom }}</td>
    </tr>
    <tr>
      <th>MONITEUR</th>
      <td>@foreach($Moniteur_tables as $Mon)
                             {{ $Mon->Moniteur_Nom }} <br>
                            @endforeach </td>
    </tr>
     <tr>
      <th>NOMBRE DE MONITEUR</th>
      <td>{{$ordinateur->Nb_Moniteur}}</td>
    </tr>
    <tr>
      <th>MODELE</th>
      <td>{{$ordinateur->Model->Model_Nom}}</td>
    </tr>
     <tr>
      <th>MARQUE</th>
      <td>{{$ordinateur->Marque->Marque_Nom}}</td>
    </tr> 
    <tr>
      <th>RAM</th>
      <td>{{$ordinateur->RAM}}&nbsp; (Go)</td>
    </tr>
      <tr>
      <th>STOCKAGE</th>
      <td>{{$ordinateur->Stockage}} &nbsp;(Go)</td>
    </tr>  
     <tr>
      <th>PROCESSEUR</th>
      <td>{{$ordinateur->Processeur->Processeur_Nom}}</td>
    </tr> 
      <tr>
      <th>WINDOWS INSTALLÉ</th>
      <td>{{$ordinateur->Os->Os_Nom}}</td>
    </tr>   <tr>
      <th>ADRESSE MAC</th>
      <td>{{$ordinateur->Addresse_MAC}}</td>
    </tr>  
     <tr>
      <th>ADRESSE IP</th>
      <td>{{$ordinateur->Addresse_IP}}</td>
    </tr>   
    <tr>
      <th>ANTIVIRUS INSTALLÉS</th>
      <td>@foreach($ordinateur->antivirus as $Anti)
                             {{ $Anti->Antivirus_Nom }} &nbsp;-
                            @endforeach </td>
    </tr> 
      <tr>
      <th>LOGICIELS INSTALLÉS</th>
      <td>@foreach($ordinateur->logiciel as $log)
                             {{ $log->Logiciel_Nom }}  &nbsp;-
                             
                            @endforeach</td>
    </tr>    
      

    
  </thead>
 
</table>

</body>
  @endsection