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
<h4 class="m-t-sm">{{$ticket->N°_de_serie}} </h4>

</div>
</div>
<ul class="profile-header-tab nav nav-tabs" style="justify-content: center; padding-right: 100px;">
<li class="nav-item "><a href="/Materiel/ticket/update/{{$ticket->id}}"  class="nav-link_">Mise á jour</a></li>
    <li class="nav-item">
    <a href="/Materiel/ticket/delete/{{$ticket->id}}" class="nav-link_" onclick="handleOneDelete(this, 'ticket', {{ $ticket->id }})">Supprimer</a>
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
                                {{ isset($ticket->Model->Model_Nom) ? $ticket->Model->Model_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">MARQUE</td>
                            <td class="value">
                                {{ isset($ticket->Marque->Marque_Nom) ? $ticket->Marque->Marque_Nom : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="field">Addresse_IP</td>
                            <td class="value">
                                {{ isset($ticket->Addresse_IP) ? $ticket->Addresse_IP : '' }}
                            </td>
                        </tr>
                                    
                    
                     
     
</tbody>
</table>


    
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