@extends('layouts.app')


    @section('content')

    @push('css')
    <link rel="stylesheet" href="/css/style.css">
     @endpush
    <body style="margin-top: 0;">
        <input type="checkbox" id="menu-toogle">

        <!-- sidebar -->
       <div class="sidebar">
           <div class="logo">
              <h1 ><span ><img src="/images/favicon-exxelia.png" alt="" style="width: 39px; height: 39px;" id="img-logo" ></span> <span>ParcInfo</span></h1>
            </div>
            <div class="sidebar_menu">
                <ul>
                    <a href="" class=""><li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><ion-icon name="home"></ion-icon></span> <span>Acceuil </span></li></a>
                    <a href="" class=""> <li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><ion-icon name="people-outline"></ion-icon></span> <span>Utilisateurs</span> </li></a>
                    <a href=""> <li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><ion-icon name="laptop-outline"></ion-icon></span> <span>Machines</span> </li></a>
                    <a href=""> <li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><ion-icon name="calendar-outline"></ion-icon></span><span>Historique d'utilisation</span></li></a>
                    <a href=""> <li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><ion-icon name="mail-outline"></ion-icon></span><span>Contact</span></li></a>
                    <a href=""> <li style="display: flex; align-items: center;"><span style="vertical-align: middle;"><ion-icon name="alert-circle-outline"></ion-icon></span> <span>Reclamations</span></li></a>
                    
                </ul>
            </div>           
       </div>

            <!-- navbar -->
            @include('nav')

            <!-- main -->
            <div class="main-content" >
                <!-- cartes section -->
                    <div class="cartes">
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>10</h1>
                                <span>Utilisateurs</span>
                            </div>
                            <div>
                                <span><img src="/images/icons8-conference-96.png"/></span>

                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>10</h1>
                                <span>Ordinateurs</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-workstation-96.png"/></span>                            </div>
                        </div>
                        </a>
                        <a href="">
                        <div class="carte">
                            <div class="info-carte">
                                <h1>10</h1>
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
                                <span>Autres</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-view-more-96.png"/></span>                            </div>
                        </div>
                        </a>                                                                      
                    </div>
                    <!-- tables users -->
                    <div class="users">
                        <div class="carte-header">
                            <h2>Utilisateurs</h2>
                            <button>Voir tous <span><img src="/images/icons8-arrow-16.png" alt="" id="arrow"></span></button>
                        </div>
                        <div class="carte-body">
                            <table style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>NOM</td>
                                        <td>Ordinateur</td>
                                        <td>Date d'utilisation</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status orange"></span> reparation</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td ><span class="status red"></span> passif </td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status red"></span> passif</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>                                                                                                                                                
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>
                                    <tr>
                                        <td>1234</td>
                                        <td>souhail aroud</td>
                                        <td>qwerty-11</td>
                                        <td>12/12/1212</td>
                                        <td > <span class="status green"></span> active</td>
                                    </tr>                                                                                                                                                                                                                                                                                               

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
    </div>
            <!-- footer -->
          @include('footer')
        
       
    </body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </html>
    @endsection