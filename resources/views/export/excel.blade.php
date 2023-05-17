<table>
    <thead>
    <tr >
        <th>N° de serie</th>
        <th>Utilisateur</th>
        <th>Nom</th>
        <th>Service</th>
        <th>Role</th>
        <th>type</th>
        <th>post</th>
        <th>Nombre de Moniteur</th>
        <th>Modele</th>

        <th>Nombre</th>

        <th>RAM</th>

        <th>STOCKAGE</th>

        <th>PROCESSEUR</th>

        <th>WINDOWS INSTALLÉ</th>
        <th>ADRESSE MAC</th>
        <th>ADRESSE IP</th>
        <th>COUT D'ACHAT</th>
        <th>DATE D'ACHAT</th>
        <th>Etat</th>

    
    </tr>
    </thead>
    <tbody>
    @foreach($ordinateur as $ord)
        <tr>
            <td>{{ $ord->N°_de_serie }}</td>
            <td>  @if(  isset($ord->employes->Prenom) && isset($ord->employes->Nom) )
                                            {{$ord->employes->Prenom}}&nbsp;{{$ord->employes->Nom}}
                                               @else
                                    <span style="color: red;">Pas d'utilisateur pour le moment</span>
                                        @endif</td>



                                        <td>{{ $ord->Nom }}</td>
                                        <td>{{ $ord->Service->Nom }}</td>
                                        <td>{{ $ord->Role->Role_Nom }}</td>
                                        <td>{{ $ord->Type->Type_Nom }}</td>
                                        <td>{{ $ord->Post->Post_Nom}}</td>
                                        
  <td>{{$ord->Nb_Moniteur}}</td>
  <td>{{$ord->Model->Model_Nom}}</td>
  <td>{{$ord->Marque->Marque_Nom}}</td>
  <td>{{$ord->RAM}} &nbsp; (Go)</td>
  <td>{{$ord->Stockage}}&nbsp; (Go)</td>
  <td>{{$ord->Processeur->Processeur_Nom}}</td>
  <td>{{$ord->Os->Os_Nom}}</td>
  <td>{{$ord->Addresse_MAC}}</td>
  <td>{{$ord->Addresse_IP}}</td>
  <td>{{$ord->Cout}}</td>
  <td>{{$ord->Date_Achat}}</td>
  <td>{{$ord->Status}}</td>


        </tr>
    @endforeach
    </tbody>
</table>