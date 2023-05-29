@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/verify.css">

     @endpush
     <input type="checkbox" id="menu-toogle">
        <!-- sidebar -->

        @include('sidebar')
            <!-- navbar -->
            @include('nav')
            @if(session('status'))
                <div class="alert alert-danger"  style="padding-left: 15rem;">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{session('status')}}
                </div>
            @endif
        
            <!-- main -->
            
            <div class="main-content"   >
        
            <div class="wrapper">
<div class="logos">
      <h1><span ><img src="/images/favicon-exxelia.png" alt="" style="width: 39px; height: 39px;" id="img-logo" ></span> <span style="color: black;">ParcInfo</span></h1>
</div>


    <h3 id="insc">Entrez mot de passe d'utilisateur pour acceder au espace admin</h3>
    <form method="POST" action="/admin/SendEmail">
    {{ csrf_field() }}
     

         <div>
                     <input id="password" type="password" placeholder="Mot de passe" class=" @error('password') is-invalid @enderror" name="pswd"  autocomplete="new-password" value="{{ old('pswd') }}">
                    <i class="far fa-eye toggle-password"  style="margin-left: -30px; cursor: pointer;"  ></i>
                    
                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
         </div>   
         


            <div>
            <div class="button">
                   <button id="btn" type="submit">Ok</button>
                 </div>

                 
              
          
                </div>  
               
    </form>
  
   

</div>
            
   @push('scripts')
   <script src="{{ asset('/js/register.js')}}"></script>
   

        @endpush
        </div>
    @endsection