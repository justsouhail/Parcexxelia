@extends('layouts.app')



    @section('content')
    @push('css')
  
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
            <div class="users" >
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
                            <span >????</span>
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
            <div class="col-md-6">
                <div class="mt-custum">
                <h3 class="mt-5">Ordinateur Info</h3>

                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                N° de serie
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Nom
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Modéle
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Type
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Systeme d'exploitation
                            </div>
                            <div class="col-4">
                                sss
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                               Processeur
                            </div>
                            <div class="col-4">
                                sss
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Stockage
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Adresse MAC
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                            Adresse IP
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Marque ecran
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Nombre d'ecran
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Covalence
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                CheckPoint
                            </div>
                            <div class="col-4">
                                Sanjay Sokal
                            </div>
                        </div>
                    </div>
                </div>
                


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