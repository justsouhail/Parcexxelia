@extends('layouts.app')

@section('content')
@push('css')
    <link rel="stylesheet" href="/css/register.css">
     @endpush
<div class="container">

<div class="wrapper">
<div class="logo">
      <h1><span ><img src="/images/favicon-exxelia.png" alt="" style="width: 39px; height: 39px;" id="img-logo" ></span> <span style="color: black;">ParcInfo</span></h1>
</div>


    <h4 id="insc">S'indentifier</h4>
    <form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
        <div>
        <input type="email" placeholder="email" id="email" class=" @error('email') is-invalid @enderror" name="email"  autocomplete="email" autofocus>
                    
                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
         </div>   

         <div>
                     <input id="password" type="password" placeholder="Mot de passe" class=" @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                    <i class="far fa-eye toggle-password"  style="margin-left: -30px; cursor: pointer;"  ></i>
                    
                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
         </div>   
         


            <div>
            <div class="button">
                   <button id="btn" type="submit">S'indentifier</button>
                 </div>

                 
                 <div class="member">
                 @if (Route::has('password.request'))
                 <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                 @endif 
                    </div>
          
                </div>  
               
    </form>
  
    <div class="member">
    Vous débutez sur ParcInfo ? <a href="/register">S'inscrire</a>
    </div>

</div>
@push('scripts')
       <script src="{{ asset('/js/register.js')}}"></script>
        @endpush
</div>


 

@endsection
