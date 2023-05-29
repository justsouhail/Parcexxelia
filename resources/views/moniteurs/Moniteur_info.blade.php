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
<h4 class="m-t-sm">{{$Moniteur->N°_de_serie}} </h4>

</div>
</div>
<ul class="profile-header-tab nav nav-tabs" style="justify-content: center; padding-right: 100px;">
<li class="nav-item "><a href="/Materiel/Moniteur/update/{{$Moniteur->id}}"  class="nav-link_">Mise á jour</a></li>
    <li class="nav-item">
    <a href="/Materiel/Moniteur/delete/{{$Moniteur->id}}" class="nav-link_" onclick="handleOneDelete(this, 'moniteur', {{ $Moniteur->id }})">Supprimer</a>
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
                                {{ isset($Moniteur->Model->Model_Nom) ? $Moniteur->Model->Model_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">MARQUE</td>
                            <td class="value">
                                {{ isset($Moniteur->Marque->Marque_Nom) ? $Moniteur->Marque->Marque_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">RESOLUTION</td>
                            <td class="value">
                                {{ isset($Moniteur->resolution) ? $Moniteur->resolution : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Ordinateur Connecté</td>
                            <td class="value">
                            @if (isset($Moniteur->ordinateur))
                            {{isset($Moniteur->ordinateur->Marque->Marque_Nom) ? $Moniteur->ordinateur->Marque->Marque_Nom : ''}}  {{isset($Moniteur->ordinateur->Model->Model_Nom) ? $Moniteur->ordinateur->Model->Model_Nom : ''}}  ({{isset($Moniteur->ordinateur->N°_de_serie) ? ($Moniteur->ordinateur->N°_de_serie) : ''}})
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                             
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Cout</td>
                            <td class="value">
                            @if (isset($Moniteur->Cout))
                            {{isset($Moniteur->Cout) ? $Moniteur->Cout : ''}}  DH
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                             
                            </td>
                        </tr>                        
                        <tr>
                            <td class="field">Date d'achat</td>
                            <td class="value">
                            @if (isset($Moniteur->Data_achat))
                            {{isset($Moniteur->Data_achat) ? $Moniteur->Data_achat : ''}}  
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                             
                            </td>
                        </tr>                        
                    
                     
     
</tbody>
</table>


<a  href="/Materiel/Moniteur/pdf/{{$Moniteur->id}}" id="boutton" class="btn btn-xs btn-primary mb-3">IMPRIMER FICHE TECHNIQUE</a>

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