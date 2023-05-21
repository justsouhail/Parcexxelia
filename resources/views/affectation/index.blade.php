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
                <div class="d-flex justify-content-center align-items-center" >

@livewire('make-multistep')
                </div>
               
      
   

            
      @push('scripts')
     

      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

      <script src="{{ asset('/js/affectation.js')}}"></script>
   
      @endpush
      </div>
    

        </div>
        
@endsection