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
    <h2 style=" margin-bottom: 2rem; color: #08473C;"><u>Fiche descriptive d'une imprimante</u></h2>
  </div>
  <div>





  <table id="customers" style="margin-top: -10px;">
<thead>
    
    <tr>
      <th>N°_de_serie</th>
      <td>{{$Imprimante->N°_de_serie}}</td>
    </tr>
    <tr>
      <th>Utilisateur</th>
      <td> @if (isset($Imprimante->employes) && $Imprimante->employes->isNotEmpty())
                                            {{$Imprimante->employes()->latest('date_affectation')->first()->Prenom}}&nbsp;{{$Imprimante->employes()->latest('date_affectation')->first()->Nom}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif</td>
    </tr>
  
   
    <tr>
    <th>MODELE</th>
    <td>{{ isset($Imprimante->Model->Model_Nom) ? $Imprimante->Model->Model_Nom : '' }}</td>
</tr>

<tr>
    <th>NOMBRE DE CARTOUCHE</th>
    <td>{{ isset($Imprimante->Nb_cartouche) ? $Imprimante->Nb_cartouche : '' }}</td>
</tr>

<tr>
    <th>MARQUE</th>
    <td>{{ isset($Imprimante->Marque->Marque_Nom) ? $Imprimante->Marque->Marque_Nom : '' }}</td>
</tr>

<tr>
    <th>Login</th>
    <td>{{ isset($Imprimante->Login) ? $Imprimante->Login : '' }}&nbsp;</td>
</tr>
<tr>
    <th>mdp</th>
    <td>{{ isset($Imprimante->mdp) ? $Imprimante->mdp : '' }}</td>
</tr>
<tr>
    <th>TYPE DE CONNEXION</th>
    <td>{{ isset($Imprimante->type_Connextion) ? $Imprimante->type_Connextion : '' }}</td>
</tr>



<tr>
    <th>ADRESSE IP</th>
    <td>{{ isset($Imprimante->Addresse_IP) ? $Imprimante->Addresse_IP : '' }}</td>
</tr>
<tr>
    <th>COULEUR</th>
    <td>{{ isset($Imprimante->Couleur) ? ($Imprimante->Couleur ? 'oui' : 'non') : '' }}</td>
    </tr>



      

    
  </thead>
 
</table>

</body>
  @endsection