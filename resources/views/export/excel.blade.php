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



                                        <td>{{ isset($ord->Nom) ? $ord->Nom : '' }}</td>
                                        <td>{{ isset($ord->employes->Service) ? $ord->employes->Service : ''}}</td>
                                        <td>{{ isset($ord->Type->Type_Nom) ? $ord->Type->Type_Nom : '' }}</td>
                                        <td>{{ isset($ord->Post->Post_Nom) ? $ord->Post->Post_Nom : '' }}</td>

                                        <td>{{ isset($ord->Nb_Moniteur) ? $ord->Nb_Moniteur : '' }}</td>
                                        <td>{{ isset($ord->Model->Model_Nom) ? $ord->Model->Model_Nom : '' }}</td>
                                        <td>{{ isset($ord->Marque->Marque_Nom) ? $ord->Marque->Marque_Nom : '' }}</td>
                                        <td>{{ isset($ord->RAM) ? $ord->RAM . '&nbsp;(Go)' : '' }}</td>
                                        <td>{{ isset($ord->Stockage) ? $ord->Stockage . '&nbsp;(Go)' : '' }}</td>
                                        <td>{{ isset($ord->Processeur->Processeur_Nom) ? $ord->Processeur->Processeur_Nom : '' }}</td>
                                        <td>{{ isset($ord->Os->Os_Nom) ? $ord->Os->Os_Nom : '' }}</td>
                                        <td>{{ isset($ord->Addresse_MAC) ? $ord->Addresse_MAC : '' }}</td>
                                        <td>{{ isset($ord->Addresse_IP) ? $ord->Addresse_IP : '' }}</td>
                                        <td>{{ isset($ord->Cout) ? $ord->Cout : '' }}</td>
                                        <td>{{ isset($ord->Date_Achat) ? $ord->Date_Achat : '' }}</td>
                                        <td>{{ isset($ord->Commentaire) ? $ord->Commentaire : '' }}</td>


        </tr>
    @endforeach
    </tbody>
</table>