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
            @include('nav', ['route' => $route])
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
    <span>Nom :</span>&nbsp;
    <span>{{ isset($employe->Nom) ? $employe->Nom : '' }}</span>
</div>
                </li>
<li>
    <div>
        <span>Prenom :</span>&nbsp;
        <span>{{ isset($employe->Prenom) ? $employe->Prenom : '' }}</span>
    </div>
</li>
<li>
    <div>
        <span>Matricule :</span>&nbsp;
        <span>{{ isset($employe->Matricule) ? $employe->Matricule : '' }}</span>
    </div>
</li>
<li>
    <div>
        <span>Sage :</span>&nbsp;
        <span>{{ isset($employe->Sage) ? $employe->Sage : '' }}</span>
    </div>
</li>
<li>
    <div>
        <span>Commun :</span>&nbsp;
        <span>{{ isset($employe->commun) ? $employe->commun : '' }}</span>
    </div>
</li>
<li>
    <div>
        <span>drive :</span>&nbsp;
        <span>{{ isset($employe->drive) ? $employe->drive : '' }}</span>
    </div>
</li>
<li>
    <div>
        <span>Service :</span> &nbsp;
        <span>{{ isset($employe->service) ? $employe->service->Nom : '' }}</span>
    </div>


                    </li>
        
                    <li id="btn">
                   <a href="/Employes/update_show/{{$employe->id}}"> <button class="infobtn"  >Mise á jour<span >
                    <ion-icon id="arrow" name="reload-circle-outline"></ion-icon>
                                </span> </button></a>
                    
                    </li> 

                    <li id="btn">
                    <a href="/Employes/delete/{{$employe->id}}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');">
                            <button class="infobtn">
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
                <h3 class="mt-5">Ordinateur Info </h3>
                </div>
                
                <div class="details">
                    @foreach($historique as $hs)
                        <div class="row" style="margin-bottom: 1rem;">
                            <div class="col-8">
                                
                            {{$hs->Marque_Nom}} &nbsp; {{$hs->Model_Nom}}&nbsp; {{$hs->N°_de_serie}}
                                                    </div>
                            <div class="col-4">
                            {{$hs->date_affectation}}
                            
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-custum">
                <h3 class="mt-5">Imprimante Info</h3>
                </div>
                
                <div class="details">
                    @foreach($historique_imprimante as $im)
                    <div class="row" style="margin-bottom: 1rem;">
                            <div class="col-8">
                                
                            {{$im->Marque_Nom}} &nbsp;  {{$im->Model_Nom}}&nbsp; {{$im->N°_de_serie}}
                                                    </div>
                            <div class="col-4">
                            {{$im->date_affectation}}
                            
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
         
    </div>  </div>  </div>

                 <!-- footer -->
   
   @push('scripts')
   

        @endpush
        </div>
    @endsection