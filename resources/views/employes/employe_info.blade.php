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
            <div class="col-md-6">
                <div class="mt-custum">
                <h3 class="mt-5">Ordinateur Info</h3>
                @if ($data) 
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                N° de serie
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->N°_de_serie}}
                            
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Nom
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Nom}}

                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Modéle
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Model->Model_Nom}}
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Type
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Type->Type_Nom}}
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Systeme d'exploitation
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Os->Os_Nom}}
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                               Processeur
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Processeur->Processeur_Nom}}
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                               RAM
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->RAM}}&nbsp;&nbsp;Go
                            </div>
                        </div>
                    </div>                    
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Stockage
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Stockage}}&nbsp;&nbsp;Go
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Adresse MAC
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Addresse_MAC}}
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                            Adresse IP
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Addresse_IP}}
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Marque 
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Marque->Marque_Nom}}
                            </div>
                        </div>
                    </div>
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Status 
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Status}}
                            </div>
                        </div>
                    </div>                    
                    <div class="details">
                        <div class="row">
                            <div class="col-8">
                                Nombre d'ecran
                            </div>
                            <div class="col-4">
                            {{$employe->Ordinateur[0]->Nb_Moniteur}}
                            </div>
                        </div>
                    </div>
     
     
            @else 
            <span style="color: red; ">Cet utilisateur n'est pas attribué à un ordinateur</span>
            <a href="#" class="btn btn-xs btn-primary mb-3 " style="margin-top: 30px; margin-left: 80px;" >Attribue á un ordinateur</a>
            @endif
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