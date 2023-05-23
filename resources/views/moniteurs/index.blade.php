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


            <form action="" method="post" id="myForm">
                @csrf
            <div class="users">
            <div class="carte-header">
                          
                            <div class="bar-recherche" class="cartes" >
                    <span><ion-icon name="search-outline"></ion-icon></span>
                     <input type="search" placeholder="Chercher Ici" >
                 </div>
                   <div class="excel" style="margin-left: 180px; cursor: pointer;" onclick="handleDelete(this, 'moniteurs')">
    <span class="status green">
        <img src="/images/icons8-trash-22.png" alt="Submit"/>
    </span>
</div>


                    <a href="/add_moniteurs" id="modalButton" >        <button type="button">Ajouter un moniteur <span >
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
                                        <td>N° de serie <span class="arrow" style="margin-left: 0px;">&UpArrow;</span></td>
                                        <td>Marque<span class="arrow">&UpArrow;</span></td>
                                        <td>Modele <span class="arrow">&UpArrow;</span></td>
                                        <td>Ordinateur<span class="arrow">&UpArrow;</span></td>
                                        <td>Resolution  <span class="arrow">&UpArrow;</span></td>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($moniteurs as $ord)

                                   <tr class="hoverable" onclick="if(event.target.tagName !== 'INPUT') { window.location='/Materiel/Moniteur/{{$ord->id}}'; }"   class="mydivouter" >
                                   <td>
                                   <input type="checkbox" class="larger-checkbox checkitem" name="ids[{{ $ord->id }}]" value="{{$ord->id}}">
                                     </td>

                                        <td>
                                            @if(isset($ord->N°_de_serie))
                                               {{$ord->N°_de_serie}}
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
                                        @if (isset($ord->ordinateur))
                                            {{isset($ord->ordinateur->Marque->Marque_Nom) ? $ord->ordinateur->Marque->Marque_Nom : ''}}  {{isset($ord->ordinateur->Model->Model_Nom) ? $ord->ordinateur->Model->Model_Nom : ''}}  ({{isset($ord->ordinateur->N°_de_serie) ? ($ord->ordinateur->N°_de_serie) : ''}})
                                        @else
                                            <span style="color: red;">Non disponible</span>
                                        @endif
                                    </td>

                                    <td>
                                            @if(isset($ord->resolution))
                                            {{$ord->resolution}}
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