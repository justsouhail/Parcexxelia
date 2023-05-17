@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/employe_info.css">
     @endpush
     <input type="checkbox" id="menu-toogle">
        <!-- sidebar -->

        @include('sidebar')
            <!-- navbar -->
            @include('nav')
            <!-- main -->
            
            <div class="main-content">
            <div class="users" style="min-height: 700px;" >
        <div class="row">
        @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="col-md-6">
                <div class="profile-links">
                <li>
                        <div>
                            <span>Nom :</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <span>{{$employe->Nom}}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Prenom :</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <span>{{$employe->Prenom}}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>CIN :</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <span>{{$employe->CIN}}</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>Service :</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <span> {{$employe->service->Nom}} <span>
                        </div>
                    </li>
        
                    <li id="btn">
                    <button data-bs-toggle="modal" data-bs-target="#updateEmployesModal" >Mise á jour<span >
                    <ion-icon id="arrow" name="reload-circle-outline"></ion-icon>
                                </span> </button>
                    
                    </li> 

                    <li id="btn">
                    <button  data-bs-toggle="modal" data-bs-target="#deleteEmployesModal">Supprimer 
                    <span >
                    <ion-icon id="arrow" name="trash-outline"></ion-icon>
                                </span> </button>
                    </li>                   
                </div>
                
            </div>
            <!-- add here -->
            <div class="col-md-6">
                <div class="mt-custum">
                <h3 class="mt-5">Ordinateur Info</h3>
                </div>
            </div>
    </div>

                 <!-- footer -->
   
   @push('scripts')

   

        @endpush
        @include('modal.update_user')
        @include('modal.delete_user')
        </div>
    @endsection