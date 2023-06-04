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
<h4 class="m-t-sm">{{$Reseau->N°_de_serie}} </h4>

</div>
</div>
<ul class="profile-header-tab nav nav-tabs" style="justify-content: center; padding-right: 100px;">
<li class="nav-item "><a href="/Materiel/Reseau/update/{{$Reseau->id}}"  class="nav-link_">Mise á jour</a></li>
    <li class="nav-item">
    <a href="/Materiel/Reseau/delete/{{$Reseau->id}}" class="nav-link_" onclick="handleOneDelete(this, 'Reseau', {{ $Reseau->id }})">Supprimer</a>
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
                                {{ isset($Reseau->Model->Model_Nom) ? $Reseau->Model->Model_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">MARQUE</td>
                            <td class="value">
                                {{ isset($Reseau->Marque->Marque_Nom) ? $Reseau->Marque->Marque_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Addresse_IP</td>
                            <td class="value">
                                {{ isset($Reseau->Addresse_IP) ? $Reseau->Addresse_IP : '' }}
                            </td>
                        </tr>
             
                        <tr>
                            <td class="field">Nom</td>
                            <td class="value">
                            @if (isset($Reseau->Nom))
                            {{isset($Reseau->Nom) ? $Reseau->Nom : ''}}  
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                             
                            </td>
                        </tr>            
                        <tr>
                            <td class="field">Localisation</td>
                            <td class="value">
                            @if (isset($Reseau->Localisation))
                            {{isset($Reseau->Localisation) ? $Reseau->Localisation : ''}}  
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                             
                            </td>
                        </tr>        
                             <tr>
                            <td class="field">Configuration</td>
                            <td class="value">
                            @if (isset($Reseau->Conf_Details))
                            {{isset($Reseau->Conf_Details) ? $Reseau->Conf_Details : ''}}  
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                             
                            </td>
                        </tr>      
                                 <tr>
                            <td class="field">Addresse_MAC</td>
                            <td class="value">
                            @if (isset($Reseau->Addresse_MAC))
                            {{isset($Reseau->Addresse_MAC) ? $Reseau->Addresse_MAC : ''}}  
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                             
                            </td>
                        </tr>                        
                    
                     
     
</tbody>
</table>


<a  href="/Materiel/Reseau/pdf/{{$Reseau->id}}" id="boutton" class="btn btn-xs btn-primary mb-3">IMPRIMER FICHE TECHNIQUE</a>

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