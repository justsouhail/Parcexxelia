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
     <div class="logo" >
<h1>
    <div style="display: flex; align-items: center;">
        <span><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/favicon-exxelia.png'))) }}" alt="" style="width: 39px; height: 39px;" id="img-logo"></span>
        <span style="color: black;">ParcInfo</span> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;    <span><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/Exxelia.png'))) }}" alt="" style="width: 120px;"></span>
    </div>

</h1>

            </div>

  <div style="text-align: center; margin-top: 0;">
    <h2 style=" margin-bottom: 2rem; color: #14375D;"><u>Fiche descriptive : Reseau</u></h2>
  </div>
  <div>





  <table id="customers" style="margin-top: -10px;">
<thead>
    
    <tr>
      <th>N°_de_serie</th>
      <td>{{$Reseau->N°_de_serie}}</td>
    </tr>

   
    <tr>
    <th>MODELE</th>
    <td>{{ isset($Reseau->Model->Model_Nom) ? $Reseau->Model->Model_Nom : '' }}</td>
</tr>

<tr>
    <th>Addresse_IP</th>
    <td>{{ isset($Reseau->Addresse_IP) ? $Reseau->Addresse_IP : '' }}</td>
</tr>

<tr>
    <th>MARQUE</th>
    <td>{{ isset($Reseau->Marque->Marque_Nom) ? $Reseau->Marque->Marque_Nom : '' }}</td>
</tr>


<tr>
    <th>Nom</th>
    <td>                            {{isset($Reseau->Nom) ? $Reseau->Nom : ''}}  
</td>
</tr>
<tr>
    <th>Addresse_MAC</th>
    <td>{{ isset($Reseau->Addresse_MAC) ? $Reseau->Addresse_MAC : '' }}</td>
</tr>


<tr>
    <th>Localisation</th>
    <td>{{ isset($Reseau->Localisation) ? $Reseau->Localisation : '' }}</td>
</tr>
<tr>
    <th>Conf_Details</th>
    <td>{{ isset($Reseau->Conf_Details) ? $Reseau->Conf_Details : '' }}</td>
</tr>



      

    
  </thead>
 
</table>

</body>
  @endsection