@extends('layouts.app')


    @section('content')

    @push('css')
    
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/affectation.css">


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
                <div class="">
                <div class="wrapper" >
     <form id="myForm" action="/Affectation/traitement" method="POST">
     @csrf
        <div id="wizard" >
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <div class="form-row"> <h4 style="padding-left: 2rem;">Entrez Numero de serie du materiel</h4> </div>
                <div class="form-row">
                    <input type="text" class="form-control" placeholder="N° de serie" name="N°_de_serie" value="{{ old('N°_de_serie') }}">
                </div>
             
            </section> <!-- SECTION 2 -->
            <h4></h4>
            <section>
            <div class="form-row"> <h4 style="padding-left: 2rem;">Entrez Nom d'utilisateur</h4> </div>
        
                <div class="form-row">
               
               <div class="container">
                   <div class="row">
                       <form class="col-md-4">
                           <select class="form-control select2" name="emp" id="empSelect">
                           <option value="">Choisir un utilisateur</option> 
                           @foreach($Employes_tables->sortBy('Nom') as $emp)
                        <option value="{{ $emp->id }}" {{ old('emp') == $emp->id ? 'selected' : '' }}>{{ $emp->Nom }} &nbsp; {{ $emp->Nom }}</option>
                        @endforeach
                           </select>
                           @error('emp')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                       </form>
                   </div>
               </div>
               <script>
                   $('.select2').select2();
               </script>
                               </div>


            </section> <!-- SECTION 3 -->
          
            <h4></h4>
            <section>
               

                        
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                    <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                    <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                </svg>
                <p class="success">Appyuier sur affecter pour Telecharger Document de decharge </p>
            </section>
            
        </div>
        <div class="actions clearfix">
  
  </div>
    </form>
</div>
                </div>
      
   

            
      @push('scripts')
  
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

      <script src="{{ asset('/js/affectation.js')}}"></script>
   
      @endpush

    

        </div>
        
@endsection