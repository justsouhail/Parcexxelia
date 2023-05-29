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
    <h2 style=" margin-bottom: 2rem; color: #08473C;"><u>Fiche descriptive de  @if($Mobile->is_smartphone) Smartphone @elseif($Mobile->is_tablet) Tablette @endif</u></h2>
  </div>
  <div>





  <table id="customers" style="margin-top: -10px;">
<thead>
 
    <tr>
      <th>N°_de_serie</th>
      <td>{{$Mobile->N°_de_serie}}</td>
    </tr>
    <tr>
      <th>Utilisateur</th>
      <td> @if (isset($Mobile->employes) && $Mobile->employes->isNotEmpty())
                                            {{$Mobile->employes()->latest('date_affectation')->first()->Prenom}}&nbsp;{{$Mobile->employes()->latest('date_affectation')->first()->Nom}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif</td>
    </tr>
  
  


<tr>
    <th>MODELE</th>
    <td>{{ isset($Mobile->Model->Model_Nom) ? $Mobile->Model->Model_Nom : '' }}</td>
</tr>
<tr>
    <th>MARQUE</th>
    <td>{{ isset($Mobile->Marque->Marque_Nom) ? $Mobile->Marque->Marque_Nom : '' }}</td>
</tr>

<tr>
    <th>STOCKAGE</th>
    <td>{{ isset($Mobile->Stockage) ? $Mobile->Stockage : '' }}&nbsp;(Go)</td>
</tr>
<tr>
    <th>Os</th>
    <td>{{ isset($Mobile->Os) ? $Mobile->Os : '' }}</td>
</tr>
<tr>
    <th>TAILLE ECRAN</th>
    <td>{{ isset($Mobile->taille_ecran) ? $Mobile->taille_ecran : '' }}</td>
</tr>


<tr>
    <th>Cout</th>
    <td>{{ isset($Mobile->Cout) ? $Mobile->Cout : '' }} DH</td>
</tr>
<tr>
    <th>DATA ACHAT</th>
    <td>{{ isset($Mobile->data_achat) ? $Mobile->data_achat : '' }}</td>
</tr>
<tr>
    <th>TYPE</th>
    <td> @if($Mobile->is_smartphone) Smartphone @elseif($Mobile->is_tablet) Tablette @endif   </td>
</tr>

      

    
  </thead>
 
</table>

</body>
  @endsection