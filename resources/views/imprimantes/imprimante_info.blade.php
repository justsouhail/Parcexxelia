@extends('layouts.app')


    @section('content')

    @push('css')
    
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/ordinateur_info.css">


     @endpush
     <input type="checkbox" id="menu-toogle">
             <!-- sidebar -->

             @include('sidebar')
            <!-- navbar -->
            @include('nav')

            <!-- main -->
            <div class="main-content" >
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
                <div class="users">
                    
                <div class="container">
<div id="content" class="content p-0">
<div class="profile-header" style="position: absolute; left: 0; right: 0; z-index: 1;">
<div class="profile-header-cover"></div>
<div class="profile-header-content" style="text-align: center;">

<div class="profile-header-info">
<h4 class="m-t-sm">{{$imprimante->N°_de_serie}} </h4>
<p class="m-b-sm">     
                                        @if (isset($imprimante->employes) && $imprimante->employes->isNotEmpty())
                                            {{$imprimante->employes()->latest('date_affectation')->first()->Prenom}}&nbsp;{{$imprimante->employes()->latest('date_affectation')->first()->Nom}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                                  
</p>
</div>
</div>
<ul class="profile-header-tab nav nav-tabs" style="justify-content: center; padding-right: 100px;">
<li class="nav-item "><a href="/Materiel/Imprimante/update/{{$imprimante->id}}"  class="nav-link_">Mise á jour</a></li>
<li class="nav-item "><a href="#" data-bs-toggle="modal" data-bs-target="#deletePCModal" class="nav-link_">Supprimer</a>
</li>
<li class="nav-item"><a class="nav-link_">Historique</a></li>
</ul>
</div>
<div class="profile-container" style="padding-top: 190px !important">
<div class="row row-space-20">
<div class="col-md-8">
<div class="tab-content p-0">
<div class="tab-pane active show" id="profile-about">
<table class="table table-profile">
<thead>
<tr>
<th colspan="2">ENVIRONNEMENT D'IMPRIMANTE</th>
</tr> 
</thead>
<tbody>


<tr>
<td class="field">URL</td>
<td class="value">
<div class="m-b-5">
{{ isset($imprimante->Addresse_IP) ? $imprimante->Addresse_IP : '' }}
</div></td>
</tr>
<tr>
<td class="field">Login</td>
<td class="value">
<div class="m-b-5">
{{ isset($imprimante->Login) ? $imprimante->Login : '' }}
</div></td>
</tr>
<tr>
<td class="field">mdp</td>
<td class="value">
<div class="m-b-5">
{{ isset($imprimante->mdp) ? $imprimante->Marque->Marque_Nom : '' }}
</div></td>
</tr>



</tbody>
</table>
<table class="table table-profile">
<thead>
<tr>
<th colspan="2">SPÉCIFICATIONS MATÉRIELLES </th>
</tr>
</thead>
<tbody>
<tr>
                            <td class="field">MODELE</td>
                            <td class="value">
                                {{ isset($imprimante->Model->Model_Nom) ? $imprimante->Model->Model_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">MARQUE</td>
                            <td class="value">
                                {{ isset($imprimante->Marque->Marque_Nom) ? $imprimante->Marque->Marque_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">TYPE CONNEXION</td>
                            <td class="value">
                                {{ isset($imprimante->type_connextion) ? $imprimante->Type : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">COULEUR</td>
                            <td class="value">
                                {{ isset($imprimante->Couleur) ? $imprimante->Couleur : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Commentaire</td>
                            <td class="value">
                                {{ isset($imprimante->Status) ? $imprimante->Status : '' }}
                            </td>
                        </tr>
                     

</tbody>
</table>


<a  href="/Materiel/Imprimante/pdf/{{$imprimante->id}}" id="boutton" class="btn btn-xs btn-primary mb-3">IMPRIMER FICHE TECHNIQUE</a>

</div>
</div>
</div>
</div>
</div>
                </div>
            </div>
      
   

            
           @push('scripts')
           <script src="{{ asset('/js/users.js')}}"></script>

           @endpush

         


             </div>
             </div>

   @endsection