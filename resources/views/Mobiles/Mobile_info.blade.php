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
<h4 class="m-t-sm">{{$Mobile->N°_de_serie}} </h4>
<p class="m-b-sm">     
                                        @if (isset($Mobile->employes) && $Mobile->employes->isNotEmpty())
                                            {{$Mobile->employes()->latest('date_affectation')->first()->Prenom}}&nbsp;{{$Mobile->employes()->latest('date_affectation')->first()->Nom}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                                  
</p>
</div>
</div>
<ul class="profile-header-tab nav nav-tabs" style="justify-content: center; padding-right: 100px;">
<li class="nav-item "><a href="/Materiel/Mobile/update/{{$Mobile->id}}"  class="nav-link_">Mise á jour</a></li>
    <li class="nav-item">
    <a href="/Materiel/Mobile/delete/{{$Mobile->id}}" class="nav-link_" onclick="handleOneDelete(this, 'Mobile', {{ $Mobile->id }})">Supprimer</a>
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
                                {{ isset($Mobile->Model->Model_Nom) ? $Mobile->Model->Model_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">MARQUE</td>
                            <td class="value">
                                {{ isset($Mobile->Marque->Marque_Nom) ? $Mobile->Marque->Marque_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">TYPE </td>
                            <td class="value">
                            @if($Mobile->is_smartphone) Smartphone @elseif($Mobile->is_tablet) Tablette @endif                            </td>
                        </tr>
                
                        <tr>
                            <td class="field">Systeme operant</td>
                            <td class="value">
                                {{ isset($Mobile->Os) ? $Mobile->Os : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Stockage</td>
                            <td class="value">
                                {{ isset($Mobile->Stockage) ? $Mobile->Stockage : '' }}&nbsp; (Go)
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Taille_ecran</td>
                            <td class="value">
                                {{ isset($Mobile->taille_ecran) ? $Mobile->taille_ecran : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Cout</td>
                            <td class="value">
                                {{ isset($Mobile->Cout) ? $Mobile->Cout : '' }} &nbsp;DH
                            </td>
                        </tr>
                        <tr>
                            <td class="field">data_achat</td>
                            <td class="value">
                                {{ isset($Mobile->data_achat) ? $Mobile->data_achat : '' }}
                            </td>
                        </tr>
                     

</tbody>
</table>


<a  href="/Materiel/Mobile/pdf/{{$Mobile->id}}" id="boutton" class="btn btn-xs btn-primary mb-3">IMPRIMER FICHE TECHNIQUE</a>

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