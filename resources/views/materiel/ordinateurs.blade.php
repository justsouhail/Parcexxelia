@extends('layouts.app')


    @section('content')

    @push('css')
   <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/users.css">
    <link rel="stylesheet" href="/css/virtual-select.min.css" />


     @endpush
     <input type="checkbox" id="menu-toogle">
             <!-- sidebar -->

             @include('sidebar')
            <!-- navbar -->
            @include('nav')

            <!-- main -->
            <div class="main-content" >
            @if(session('status'))
                <div class="alert {{ session('error') ? 'alert-danger' : 'alert-success' }}">
                    @if(session('error'))
                        <strong>Error: </strong>
                    @endif
                    {{ session('status') }}
                </div>
            @endif



            <div class="users">
            <div class="carte-header">
                            <h2 id="gerer"  >Ordinateurs</h2>
                            
                            <div class="bar-recherche" class="cartes" >
                    <span><ion-icon name="search-outline"></ion-icon></span>
                     <input type="search" placeholder="Chercher Ici" >
                 </div>
                 <div class="excel" style="margin-left: 180px;">
                            <span class="status green">
                            <img src="/images/icons8-excel-22.png"/>
                            </span>
                            </div>                           

                           <button class="cartes"  data-bs-toggle="modal" data-bs-target="#AddOrdinateurModal">Ajouter un Ordinateur <span >
                           <ion-icon id="arrow" name="add-circle-outline"></ion-icon>
                                </span></button>

                     
                        </div>
                        <div class="carte-body">
                            <table style="width: 100%;" id="data">
                                
                            <thead>
                                    <tr >
                                        <td>N° de serie <span class="arrow" style="margin-left: 0px;">&UpArrow;</span></td>
                                        <td>Marque<span class="arrow">&UpArrow;</span></td>
                                        <td>Service <span class="arrow">&UpArrow;</span></td>
                                        <td>Utilisateur<span class="arrow">&UpArrow;</span></td>
                                        <td>Type <span class="arrow">&UpArrow;</span></td>
                                        <td>Role <span class="arrow">&UpArrow;</span></td>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ordinateur as $ord)
                                   <tr class="hoverable" onclick="window.location='/Ordinateur/{{$ord->id}}'"    class="mydivouter" >
                                        
                                        <td> {{$ord->N°_de_serie}}</td>
                                        <td>{{$ord->Marque->Marque_Nom}}</td>
                                        <td>{{$ord->Service->Nom}}</td>
                                        <td>{{$ord->employes->Prenom}}&nbsp;{{$ord->employes->Nom}}</td>
                                        <td>{{$ord->Type->Type_Nom}}</td>
                                        <td>{{$ord->Role->Role_Nom}}</td>
                                        <td></td>

                                    
                                    </tr>
                                     @endforeach      
                            
                                </tbody>
                            </table>
                        </div>

            



             
            </div>
           
   

            
            @push('scripts')
           
  
      <script src="{{ asset('/js/users.js')}}"></script>
      <script src="{{ asset('/js/virtual-select.min.js')}}"></script>

            @endpush


          

              </div>
              @include('modal.create_ordinateur')
    @endsection