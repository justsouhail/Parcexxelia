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



#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #14375D;
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
    <h2 style=" margin-bottom: 2rem; color: #14375D;"><u>Fiche descriptive : Moniteur</u></h2>
  </div>
  <div>





  <table id="customers" style="margin-top: -10px;">
<thead>
    
    <tr>
      <th>N°_de_serie</th>
      <td>{{$Moniteur->N°_de_serie}}</td>
    </tr>

   
    <tr>
    <th>MODELE</th>
    <td>{{ isset($Moniteur->Model->Model_Nom) ? $Moniteur->Model->Model_Nom : '' }}</td>
</tr>

<tr>
    <th>RESOLUTION</th>
    <td>{{ isset($Moniteur->resolution) ? $Moniteur->resolution : '' }}</td>
</tr>

<tr>
    <th>MARQUE</th>
    <td>{{ isset($Moniteur->Marque->Marque_Nom) ? $Moniteur->Marque->Marque_Nom : '' }}</td>
</tr>

<tr>
    <th>Ordinateur Connecté</th>
    <td> {{isset($Moniteur->ordinateur->Marque->Marque_Nom) ? $Moniteur->ordinateur->Marque->Marque_Nom : ''}}  {{isset($Moniteur->ordinateur->Model->Model_Nom) ? $Moniteur->ordinateur->Model->Model_Nom : ''}}  ({{isset($Moniteur->ordinateur->N°_de_serie) ? ($Moniteur->ordinateur->N°_de_serie) : ''}})
</td>
</tr>
<tr>
    <th>Cout</th>
    <td>                            {{isset($Moniteur->Cout) ? $Moniteur->Cout : ''}}  DH
</td>
</tr>
<tr>
    <th>Date_achat</th>
    <td>{{ isset($Moniteur->Date_achat) ? $Moniteur->Date_achat : '' }}</td>
</tr>







      

    
  </thead>
 
</table>

</body>
  @endsection