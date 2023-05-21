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
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <div class="users" style="min-height: 700px;" >
        <div class="row">
    
            <div class="col-md-6">
                <div class="profile-links">
                <li>
                <div>
    <span>Nom :</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <span>{{ isset($employe->Nom) ? $employe->Nom : '' }}</span>
</div>
                </li>
<li>
    <div>
        <span>Prenom :</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span>{{ isset($employe->Prenom) ? $employe->Prenom : '' }}</span>
    </div>
</li>
<li>
    <div>
        <span>CIN :</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span>{{ isset($employe->CIN) ? $employe->CIN : '' }}</span>
    </div>
</li>
<li>
    <div>
        <span>Service :</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span>{{ isset($employe->service) ? $employe->service->Nom : '' }}</span>
    </div>


                    </li>
        
                    <li id="btn">
                   <a href="/Employes/update_show/{{$employe->id}}"> <button  >Mise á jour<span >
                    <ion-icon id="arrow" name="reload-circle-outline"></ion-icon>
                                </span> </button></a>
                    
                    </li> 

                    <li id="btn">
                    <a href="/Employes/delete/{{$employe->id}}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                            <button data-bs-toggle="modal">
                                Supprimer
                                <span>
                                    <ion-icon id="arrow" name="trash-outline"></ion-icon>
                                </span>
                            </button>
                        </a>

                    </li>                   
                </div>
                
            </div>
            <!-- add here -->
            <div class="col-md-6">
                <div class="mt-custum">
                <h3 class="mt-5">Ordinateur Info</h3>
                </div>
                
                <div class="details">
                    @foreach($historique as $hs)
                        <div class="row" style="margin-bottom: 1rem;">
                            <div class="col-8">
                                
                            {{$hs->Marque_Nom}} &nbsp;  {{$hs->Model_Nom}}&nbsp; {{$hs->N°_de_serie}}
                                                    </div>
                            <div class="col-4">
                            {{$hs->date_affectation}}
                            
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-custum">
                <h3 class="mt-5">Autres materiel Info</h3>
                </div>
                
                <div class="details">
                    @foreach($employe->Ordinateurs as $ord)
                        <div class="row">
                            <div class="col-8">
                                
                                                    </div>
                            <div class="col-4">
                           
                            
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
         
    </div>  </div>  </div>

                 <!-- footer -->
   
   @push('scripts')
   <script src="{{ asset('/js/employes.js')}}"></script>
   

        @endpush
        </div>
    @endsection