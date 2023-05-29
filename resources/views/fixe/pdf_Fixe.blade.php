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
      <th>N°_de_serie</th>
      <td>{{$Fixe->N°_de_serie}}</td>
    </tr>
    <tr>
      <th>Utilisateur</th>
      <td> @if (isset($Fixe->employes) && $Fixe->employes->isNotEmpty())
                                            {{$Fixe->employes()->latest('date_affectation')->first()->Prenom}}&nbsp;{{$Fixe->employes()->latest('date_affectation')->first()->Nom}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif</td>
    </tr>
  
  

    <tr>
    <th>MODELE</th>
    <td>{{ isset($Fixe->Model->Model_Nom) ? $Fixe->Model->Model_Nom : '' }}</td>
</tr>
<tr>
    <th>MARQUE</th>
    <td>{{ isset($Fixe->Marque->Marque_Nom) ? $Fixe->Marque->Marque_Nom : '' }}</td>
</tr>
<tr>
      <th>astreinte telephonique</th>
      <td>{{ isset($Fixe->astreinte) ? $Fixe->astreinte : '' }}</td>
    </tr>
    <tr>
    <th>Date_Installation</th>
    <td>{{ isset($Fixe->Date_Installation) ? $Fixe->Date_Installation : '' }}</td>
</tr>
<tr>
    <th>Commentaire</th>
    <td>{{ isset($Fixe->Commentaire) ? $Fixe->Commentaire : '' }}</td>
</tr>


<tr>
    <th>ADRESSE IP</th>
    <td>{{ isset($Fixe->Addresse_IP) ? $Fixe->Addresse_IP : '' }}</td>
</tr>
<tr>
    <th>Date_Achat</th>
    <td>{{ isset($Fixe->Date_Achat) ? $Fixe->Date_Achat : '' }}</td>
</tr>
<tr>
    <th>Date_Installation</th>
    <td>{{ isset($Fixe->Date_Installation) ? $Fixe->Date_Installation : '' }}</td>
</tr>
<tr>
    <th>Cout</th>
    <td>{{ isset($Fixe->Cout) ? $Fixe->Cout : '' }}  DH</td>
</tr>
<tr>
    <th>Autorisation</th>
    <td>{{ isset($Fixe->Autorisation) ? $Fixe->Autorisation : '' }}  DH</td>
</tr>
      

    
  </thead>
 
</table>

</body>
  @endsection