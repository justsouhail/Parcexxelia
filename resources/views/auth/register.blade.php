@extends('layouts.app')

@section('content')
@push('css')
    <link rel="stylesheet" href="/css/register.css">
     @endpush

  


        <div class="container">

        <div class="wrapper">
        <div class="logo">
              <h1><span ><img src="/images/favicon-exxelia.png" alt="" style="width: 39px; height: 39px;" id="img-logo" ></span> <span>ParcInfo</span></h1>
              
        </div>
            <!-- <h4 id="insc">S'inscrire</h4> -->
            <form  method="POST" action="{{ route('register') }}">

            {{ csrf_field() }}  

                 <div>
                    
                <input type="text" placeholder="Nom" id="Nom"  value="{{ old('Nom') }}" class=" @error('Nom') is-invalid @enderror " name="Nom"  autocomplete="Nom" autofocus>
                
                @error('Nom')
              <span class="invalid-feedback mt-0" role="alert">
                <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                 </div> 

                 <div>
                    <input type="text" placeholder="Prenom" id="Prenom"value="{{ old('Prenom') }}" class=" @error('Prenom') is-invalid @enderror" name="Prenom"  autocomplete="Prenom" autofocus>
                    
                    @error('Prenom')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                     </div> 

                     <div>
                    <input type="text" placeholder="Societe" id="Societe" value="{{ old('Societe') }}" class=" @error('Societe') is-invalid @enderror" name="Societe"  autocomplete="Societe" autofocus>
                    
                    @error('Societe')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                     </div>  

                     <div>
                     <input type="email" placeholder="email" id="email" value="{{ old('email') }}" class=" @error('email') is-invalid @enderror" name="email"  autocomplete="email" autofocus>
                    
                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                     </div>               


                     <div >
                      <input id="password" type="password" placeholder="Mot de passe" value="{{ old('password') }}" class=" @error('password') is-invalid @enderror" name="password"  autocomplete="new-password"   >
                      <i class="far fa-eye toggle-password"  style="margin-left: -30px; cursor: pointer;"  ></i>
                      
                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                     </div>    

  

                      <div>
                      <input id="password_confirm" value="{{ old('password_confirm') }}"  placeholder="Confirmer mot de passe" type="password" class=" @error('password_confirm') is-invalid @enderror" name="password_confirm"  autocomplete="new-password">
                      <i class="far fa-eye toggle-password"  style="margin-left: -30px; cursor: pointer;"  ></i>
                      @error('password_confirm')
                                          <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                        </span>
                                      @enderror
                      </div>   

                     <div class="button">
                    <button id="btn" type="submit" >S'inscrire</button>
                    </div>
                     

        

            </form>
           
            <div class="member">
            Déjà inscrit(e) ? <a href="/login">S'identifier</a>
            </div>
        </div>
        @push('scripts')
       <script src="{{ asset('/js/register.js')}}"></script>
        @endpush
   
     
        </div>

 
@endsection
