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
<h4 class="m-t-sm">{{$ordinateur->N°_de_serie}} </h4>
<p class="m-b-sm">     
                                        @if (isset($ordinateur->employes) && $ordinateur->employes->isNotEmpty())
                                            {{$ordinateur->employes()->latest('date_affectation')->first()->Prenom}}&nbsp;{{$ordinateur->employes()->latest('date_affectation')->first()->Nom}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                                  
    <br>{{$ordinateur->Nom}}
</p>
</div>
</div>
<ul class="profile-header-tab nav nav-tabs" style="justify-content: center; padding-right: 100px;">
<li class="nav-item "><a href="/Materiel/Ordinateur/update/{{$ordinateur->id}}"  class="nav-link_">Mise á jour</a></li>
<li class="nav-item">
  <a class="nav-link_" onclick="handleOneDelete(this, 'ordinateur' ,({{$ordinateur->id}}) )">Supprimer</a>
</li></li>
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
<th colspan="2">ENVIRONNEMENT D'ORDINATEUR</th>
</tr> 
</thead>
<tbody>

<tr>
                            <td class="field">ROLE</td>
                            <td class="value">
                                <div class="m-b-5">
                                    {{ isset($ordinateur->Role->Role_Nom) ? $ordinateur->Role->Role_Nom : '' }}
                                </div>
                            </td>
                        </tr>

</td>
</tr>
<tr>
<td class="field">TYPE</td>
<td class="value">
<div class="m-b-5">
{{ isset($ordinateur->Type->Type_Nom) ? $ordinateur->Type->Type_Nom : '' }}
</div></td>
</tr>
<tr>
                            <td class="field">MONITEUR</td>
                            <td class="value">
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
<td class="field">MONITEUR</td>
<td class="value">
                            
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
                            <td class="field">NOMBRE DE MONITEUR</td>
                            <td class="value">
                                {{ isset($ordinateur->Nb_Moniteur) ? $ordinateur->Nb_Moniteur : '' }}
                            </td>
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
                                {{ isset($ordinateur->Model->Model_Nom) ? $ordinateur->Model->Model_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">MARQUE</td>
                            <td class="value">
                                {{ isset($ordinateur->Marque->Marque_Nom) ? $ordinateur->Marque->Marque_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">RAM</td>
                            <td class="value">
                                {{ isset($ordinateur->RAM) ? $ordinateur->RAM : '' }}&nbsp;(Go)
                            </td>
                        </tr>
                        <tr>
                            <td class="field">STOCKAGE</td>
                            <td class="value">
                                {{ isset($ordinateur->Stockage) ? $ordinateur->Stockage : '' }}&nbsp;(Go)
                            </td>
                        </tr>
                        <tr>
                            <td class="field">PROCESSEUR</td>
                            <td class="value">
                                {{ isset($ordinateur->Processeur->Processeur_Nom) ? $ordinateur->Processeur->Processeur_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">WINDOWS INSTALLÉ</td>
                            <td class="value">
                                {{ isset($ordinateur->Os->Os_Nom) ? $ordinateur->Os->Os_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">ADRESSE MAC</td>
                            <td class="value">
                                {{ isset($ordinateur->Addresse_MAC) ? $ordinateur->Addresse_MAC : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">ADRESSE IP</td>
                            <td class="value">
                                {{ isset($ordinateur->Addresse_IP) ? $ordinateur->Addresse_IP : '' }}
                            </td>
                        </tr>

</tbody>
</table>
<table class="table table-profile">
<thead>
<tr>
<th colspan="2">ANTIVIRUS & LOGICIELS</th>
</tr>
</thead>
<tbody>
<tr>
<td class="field">ANTIVIRUS INSTALLÉS</td>
<td class="value">
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
<td class="field">LOGICIELS INSTALLÉS</td>
<td class="value">
@if (count($ordinateur->logiciel) > 0)    
@foreach($ordinateur->logiciel as $log)
                             {{ $log->Logiciel_Nom }} <br>
                             
                            @endforeach 
                            @else
                            <span style="color: red;">Non disponible</span>
        @endif
</td>
</tr>

</tbody>
</table>
</div>
</div>
</div>
<div class="col-md-4 hidden-xs hidden-sm">
<ul class="profile-info-list">
<th colspan="2" style="font-weight: 700;"><b>INFOMATIONS SUPPLEMENTAIRES</b></th>
<li>
<div class="field" style="color: #666666;">COUT D'ACHAT</div>
@if (isset($ordinateur->Cout))
<div class="value">{{$ordinateur->Cout}}&nbsp;&nbsp; DH</div>
@else
  <span style="color: red;">Non disponible</span>
  @endif
</li>
<li>
<div class="field" style="color: #666666;">DATE D'ACHAT</div>
@if (isset($ordinateur->Date_Achat))
    <span style="color: black;">{{ $ordinateur->Date_Achat }}  </span>
  @else
  <span style="color: red;">Non disponible</span>
  @endif
</li>
<li>
<div class="field" style="color: #666666;">Etat</div>
@if (isset($ordinateur->Commentaire))
    {{ $ordinateur->Commentaire }}
  @else
  <span style="color: red;">Non disponible</span>
  @endif
</li>

<a  href="/Materiel/Ordinateur/pdf/{{$ordinateur->id}}" id="boutton" class="btn btn-xs btn-primary mb-3">IMPRIMER FICHE TECHNIQUE</a>
</ul>
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

         
           @include('modal.delete_pc')

             </div>
             
   @endsection