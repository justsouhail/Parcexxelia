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
     <div class="logo" >
<h1>
    <div style="display: flex; align-items: center;">
        <span><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/favicon-exxelia.png'))) }}" alt="" style="width: 39px; height: 39px;" id="img-logo"></span>
        <span style="color: black;">ParcInfo</span> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;    <span><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/Exxelia.png'))) }}" alt="" style="width: 120px;"></span>
    </div>

</h1>

            </div>

  <div style="text-align: center; margin-top: 0;">
    <h2 style=" margin-bottom: 2rem; color: #08473C;"><u>Fiche descriptive d'ordinateur</u></h2>
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
      <th>ROLE</th>
      <td>{{$ordinateur->Role->Role_Nom}}</td>
    </tr>
    <tr>
    <th>TYPE</th>
    <td>{{ isset($ordinateur->Type->Type_Nom) ? $ordinateur->Type->Type_Nom : '' }}</td>
</tr>
<tr>
    <th>POST</th>
    <td>{{ isset($ordinateur->Post->Post_Nom) ? $ordinateur->Post->Post_Nom : '' }}</td>
</tr>
<tr>
    <th>MONITEUR</th>
    <td>
        @if (count($Moniteur_tables) > 0)
            @foreach($Moniteur_tables as $Mon)
                {{ $Mon->Moniteur_Nom }} <br>
            @endforeach
        @else
            <span style="color: red;">Non disponible</span>
        @endif
    </td>
</tr>
<tr>
    <th>NOMBRE DE MONITEUR</th>
    <td>{{ isset($ordinateur->Nb_Moniteur) ? $ordinateur->Nb_Moniteur : '' }}</td>
</tr>
<tr>
    <th>MODELE</th>
    <td>{{ isset($ordinateur->Model->Model_Nom) ? $ordinateur->Model->Model_Nom : '' }}</td>
</tr>
<tr>
    <th>MARQUE</th>
    <td>{{ isset($ordinateur->Marque->Marque_Nom) ? $ordinateur->Marque->Marque_Nom : '' }}</td>
</tr>
<tr>
    <th>RAM</th>
    <td>{{ isset($ordinateur->RAM) ? $ordinateur->RAM : '' }}&nbsp;(Go)</td>
</tr>
<tr>
    <th>STOCKAGE</th>
    <td>{{ isset($ordinateur->Stockage) ? $ordinateur->Stockage : '' }}&nbsp;(Go)</td>
</tr>
<tr>
    <th>PROCESSEUR</th>
    <td>{{ isset($ordinateur->Processeur->Processeur_Nom) ? $ordinateur->Processeur->Processeur_Nom : '' }}</td>
</tr>
<tr>
    <th>WINDOWS INSTALLÉ</th>
    <td>{{ isset($ordinateur->Os->Os_Nom) ? $ordinateur->Os->Os_Nom : '' }}</td>
</tr>


<tr>
    <th>ADRESSE MAC</th>
    <td>{{ isset($ordinateur->Addresse_MAC) ? $ordinateur->Addresse_MAC : '' }}</td>
</tr>
<tr>
    <th>ADRESSE IP</th>
    <td>{{ isset($ordinateur->Addresse_IP) ? $ordinateur->Addresse_IP : '' }}</td>
</tr>
<tr>
    <th>ANTIVIRUS INSTALLÉS</th>
    <td>
        @if (count($ordinateur->antivirus) > 0)
            @foreach($ordinateur->antivirus as $Anti)
                {{ $Anti->Antivirus_Nom }} <br>
            @endforeach
        @else
            <span style="color: red;">Non disponible</span>
        @endif
    </td>
</tr>
<tr>
    <th>LOGICIELS INSTALLÉS</th>
    <td>
        @if (count($ordinateur->logiciel) > 0)
            @foreach($ordinateur->logiciel as $log)
                {{ $log->Logiciel_Nom }} <br>
            @endforeach
        @else
            <span style="color: red;">Non disponible</span>
        @endif
    </td>
</tr> 
      

    
  </thead>
 
</table>

</body>
  @endsec