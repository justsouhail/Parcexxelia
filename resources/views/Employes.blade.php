@extends('layouts.app')



    @section('content')
    @push('css')
  
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/users.css">
     @endpush
     <input type="checkbox" id="menu-toogle">
        <!-- sidebar -->

        @include('sidebar')
            <!-- navbar -->
            @include('nav')
            <!-- main -->
            
            <div class="main-content">
   
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="users">
            <div class="carte-header">
                            <h2 id="gerer"  >Gerez vos Utilisateurs</h2>
                            
                            <div class="bar-recherche" class="cartes" >
                    <span><ion-icon name="search-outline"></ion-icon></span>
                     <input type="search" placeholder="Chercher Ici" >
                 </div>

                           <button class="cartes"  data-bs-toggle="modal" data-bs-target="#AddEmployesModal">Ajouter un Utilisateur <span >
                           <ion-icon id="arrow" name="add-circle-outline"></ion-icon>
                                </span></button>
                           
                        </div>
                        <div class="carte-body">
                            <table style="width: 100%;" id="data">
                                
                            <thead>
                                    <tr >
                                        <td>CIN <span class="arrow" style="margin-left: 0px;">&UpArrow;</span></td>
                                        <td>Nom & Prenom  <span class="arrow">&UpArrow;</span></td>
                                        <td>Service <span class="arrow">&UpArrow;</span></td>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employes as $employe)
                                   <tr class="hoverable"onclick="window.location='/Employes/{{$employe->id}}';"    class="mydivouter" >
                                        <td>{{$employe->CIN}}</td>
                                        <td><strong>{{  $employe->Prenom}} &nbsp{{ $employe->Nom}}</strong></td>
                                        <td>{{  $employe->service->Nom}}</td>
                                    
                                    
                                    </tr>
                              
                                            @endforeach                                                                                                                                                                                                                                                                                                                                                                                                          
                            
                                </tbody>
                            </table>
                        </div>

            



             
            </div>
           
   
   
   @push('scripts')
       <script src="{{ asset('/js/users.js')}}"></script>
        @endpush

        </div>
    @include('modal.create_user')


    @endsection