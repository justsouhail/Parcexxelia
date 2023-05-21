@extends('layouts.app')


    @section('content')

    @push('css')
    <link rel="stylesheet" href="/css/history_index.css">
    <link rel="stylesheet" href="/css/nav_sidebar.css">

     @endpush
     <input type="checkbox" id="menu-toogle">
             <!-- sidebar -->

             @include('sidebar')
            <!-- navbar -->
            @include('nav')

            <!-- main -->
            <div class="main-content" >

            <div class="users" style="min-height: 600px;">
                <div style="text-align: center; margin-top: 1rem;" >
                 <h1>Consulter historique par : </h1>
                </div>
            
            <div style="">
                   
            <form  action="/history/traitement" method="POST"  class="cartes">
       @csrf
      <div class="carte_container">
                        
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Ordinateur</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-workstation-96.png"/></span>                            </div>

                        </div>
                            <div>
                            <input type="text" class="form-control" placeholder="N° de serie" name="N°_de_serie" value="{{ old('N°_de_serie') }}" id="Input">

                            </div>
                        

                        

                        </div>             

                    <div class="carte_container">
                        
                        <div class="carte">
                            <div class="info-carte">
                                
                                <span>Utilisateur</span>
                            </div>
                            <div>
                            <span><img src="/images/icons8-conference-96.png"/></span>                            </div>

                        </div>
                            <div>

                            <select class="form-control select2" name="emp" id="empSelect">
                           <option value="">Choisir un utilisateur</option> 
                           @foreach($Employes_tables->sortBy('Nom') as $emp)
                        <option value="{{ $emp->id }}" {{ old('emp') == $emp->id ? 'selected' : '' }}>{{ $emp->Nom }} &nbsp; {{ $emp->Nom }}</option>
                        @endforeach
                           </select>

                            </div>
                            </div>
                            

                            <div style="display: flex; justify-content: center; margin-top: 9rem; margin-left: 30rem;">
                    <button type="submit" class="submit-btn" id="boutton" class="btn btn-primary">Consulter</button>
                </div>

      </form>
                     

                    </div>
                   

            @push('scripts')
            <script src="{{ asset('/js/history.js')}}"></script>
        

            @endpush

          

              </div>
              </div>
    @endsection