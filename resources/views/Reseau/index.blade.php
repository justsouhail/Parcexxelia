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
            @include('nav', ['route' => $route])

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


            <form action="" method="post" id="myForm">
                @csrf
            <div class="users">
            <div class="carte-header">
                          
                            <div class="bar-recherche" class="cartes" >
                    <span><ion-icon name="search-outline"></ion-icon></span>
                     <input type="search" placeholder="Chercher Ici" >
                 </div>
                   <div class="excel" style="margin-left: 180px; cursor: pointer;" onclick="handleDelete(this, 'Reseau')">
    <span class="status green">
        <img src="/images/icons8-trash-22.png" alt="Submit"/>
    </span>
</div>


                    <a href="/add_Reseau" id="modalButton" >        <button type="button">Ajouter un materiel reseau <span >
                           <ion-icon id="arrow" name="add-circle-outline"></ion-icon>
                                </span></button></a>

                     
                        </div>
                        <div class="carte-body">
                            <table style="width: 100%;" id="data">
                                
                            <thead>
                                    <tr >
                                    <td>
                                    <input type="checkbox" id="checkall" class="larger-checkbox" onchange="handleCheckboxChange(this)">

                                     </td>
                                        <td>Nom <span class="arrow" style="margin-left: 0px;">&UpArrow;</span></td>
                                        <td>Marque<span class="arrow">&UpArrow;</span></td>
                                        <td>Modele <span class="arrow">&UpArrow;</span></td>
                                        <td>Localisation<span class="arrow">&UpArrow;</span></td>
                                        <td>Date d'ajout  <span class="arrow">&UpArrow;</span></td>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Reseaus as $ord)

                                   <tr class="hoverable" onclick="if(event.target.tagName !== 'INPUT') { window.location='/Materiel/Reseau/{{$ord->id}}'; }"   class="mydivouter" >
                                   <td>
                                   <input type="checkbox" class="larger-checkbox checkitem" name="ids[{{ $ord->id }}]" value="{{$ord->id}}">
                                     </td>

                                        <td>
                                            @if(isset($ord->Nom))
                                               {{$ord->Nom}}
                                               @else
                                    <span style="color: red;">Non disponible</span>
                                        @endif
                                    </td>
                                    <td>
                                            @if(isset($ord->Marque->Marque_Nom))
                                               {{$ord->Marque->Marque_Nom}}
                                               @else
                                    <span style="color: red;">Non disponible</span>
                                        @endif
                                    </td>
                                    <td>
                                            @if(isset($ord->Model->Model_Nom))
                                               {{$ord->Model->Model_Nom}}
                                               @else
                                    <span style="color: red;">Non disponible</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($ord->Localisation))
                                            {{isset($ord->Localisation) ? $ord->Localisation : ''}}
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                                    </td>   

                                    <td>
                                            @if(isset($ord->created_at))
                                            {{$ord->created_at}}
                                            @else
                                    <span style="color: red;">Non disponible</span>
                                        @endif
                                    </td>
                                 
                                      

                                    
                                    </tr>
                                     @endforeach      
                            
                                </tbody>
                            </table>
                        </div>

            



             
            </div>
           
            </form>

            
            @push('scripts')
           
  
      <script src="{{ asset('/js/users.js')}}"></script>
      <script src="{{ asset('/js/virtual-select.min.js')}}"></script>
     
            @endpush


          

              </div>
    @endsection