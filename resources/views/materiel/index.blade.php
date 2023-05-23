@extends('layouts.app')


    @section('content')

    @push('css')
    <link rel="stylesheet" href="/css/Materiel_index.css">
    <link rel="stylesheet" href="/css/nav_sidebar.css">

     @endpush
     <input type="checkbox" id="menu-toogle">
             <!-- sidebar -->

             @include('sidebar')
            <!-- navbar -->
            @include('nav')

            <!-- main -->
            <div class="main-content" >

            <div class="users">
                <div style="text-align: center;">
                 <h1>Choisissez type de machine </h1>
                </div>
            
            <div class="cartes">
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>10</h1>
                                <span>Matériel reseau</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-wi-fi-96.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="/Materiel/ordinateurs">
                        <div class="carte">
                            <div class="info-carte">
                            <h1>{{isset($count_ord) ? $count_ord : 0}} </h1>
                                <span>Ordinateurs</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-workstation-96.png"/></span>                            </div>
                        </div>
                        </a>
                        <a href="/Materiel/imprimante">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>{{isset($count_imprimante) ? $count_imprimante : 0}} </h1>
                                <span>Imprimantes</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-print-96.png"/></span>                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>10</h1>
                                <span>Scanner</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-scanner-96.png"/></span>                            </div>
                        </div>
                        </a>           
                        <a href="/Materiel/Mobile">
                        <div class="carte">
                            <div class="info-carte">
                            <h1>{{isset($count_mobile) ? $count_mobile : 0}} </h1>
                                <span>Appareil Mobile </span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-ipad-96.png"/></span>                            </div>
                        </div>
                        </a>  
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>10</h1>
                                <span>Machine Ticket</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-ticket-96.png"/></span>                            </div>
                        </div>
                        </a>         
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                            <h1>11 </h1>
                                <span>Telephone fixe</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-office-phone-96.png"/></span>                            </div>
                        </div>
                        </a>               
                        <a href="/Materiel/Moniteur">
                        <div class="carte">
                            <div class="info-carte">
                            <h1>{{isset($count_moniteurs) ? $count_moniteurs : 0}} </h1>
                                <span>Moniteur</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-monitor-96.png"/></span>                            </div>
                        </div>
                        </a>                                                                 
                    </div>
                    </div>
            @push('scripts')
            <script src="{{ asset('/js/users.js')}}"></script>
        

            @endpush

          

              </div>
    @endsection