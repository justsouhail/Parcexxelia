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
            @include('nav', ['route' => $route])

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
<h4 class="m-t-sm">{{$Fixe->N°_de_serie}} </h4>
<p class="m-b-sm">     
                                        @if (isset($Fixe->employes) && $Fixe->employes->isNotEmpty())
                                            {{$Fixe->employes()->latest('date_affectation')->first()->Prenom}}&nbsp;{{$Fixe->employes()->latest('date_affectation')->first()->Nom}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                                  
</p>
</div>
</div>
<ul class="profile-header-tab nav nav-tabs" style="justify-content: center; padding-right: 100px;">
<li class="nav-item "><a href="/Materiel/Fixe/update/{{$Fixe->id}}"  class="nav-link_">Mise á jour</a></li>
    <li class="nav-item">
    <a href="/Materiel/Fixe/delete/{{$Fixe->id}}" class="nav-link_" onclick="handleOneDelete(this, 'Fixe', {{ $Fixe->id }})">Supprimer</a>
    </li>
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
<th colspan="2">SPÉCIFICATIONS MATÉRIELLES </th>
</tr>
</thead>
<tbody>
<tr>
                            <td class="field">MODELE</td>
                            <td class="value">
                                {{ isset($Fixe->Model->Model_Nom) ? $Fixe->Model->Model_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">MARQUE</td>
                            <td class="value">
                                {{ isset($Fixe->Marque->Marque_Nom) ? $Fixe->Marque->Marque_Nom : '' }}
                            </td>
                        </tr>
                      
                
                        <tr>
                            <td class="field">N°_de_serie</td>
                            <td class="value">
                                {{ isset($Fixe->N°_de_serie) ? $Fixe->N°_de_serie : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">astreinte telephonique</td>
                            <td class="value">
                                {{ isset($Fixe->astreinte) ? $Fixe->astreinte : '' }}&nbsp; 
                            </td>
                        </tr>
                        <tr>
                        <td class="field">Autorisation</td>
                            <td class="value">
                                {{ isset($Fixe->Autorisation) ? $Fixe->Autorisation : '' }}&nbsp; 
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Addresse_IP</td>
                            <td class="value">
                                {{ isset($Fixe->Addresse_IP) ? $Fixe->Addresse_IP : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Cout</td>
                            <td class="value">
                                {{ isset($Fixe->Cout) ? $Fixe->Cout : '' }} &nbsp;DH
                            </td>
                        </tr>
                        <tr>
                            <td class="field">data_achat</td>
                            <td class="value">
                                {{ isset($Fixe->Date_Achat) ? $Fixe->Date_Achat : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Date_Installation</td>
                            <td class="value">
                                {{ isset($Fixe->Date_Installation) ? $Fixe->Date_Installation : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Commentaire</td>
                            <td class="value">
                                {{ isset($Fixe->Commentaire) ? $Fixe->Commentaire : '' }}
                            </td>
                        </tr>
                     

</tbody>
</table>


<a  href="/Materiel/Fixe/pdf/{{$Fixe->id}}" id="boutton" class="btn btn-xs btn-primary mb-3">IMPRIMER FICHE TECHNIQUE</a>

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