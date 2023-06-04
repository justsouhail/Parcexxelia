@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/employe_info.css">
    <link rel="stylesheet" href="/css/ordinateur_update.css">
    <link rel="stylesheet" href="/css/virtual-select.min.css" />
    <link rel="stylesheet" href="/css/users.css">


     @endpush
     <input type="checkbox" id="menu-toogle">
        <!-- sidebar -->

        @include('sidebar')
            <!-- navbar -->
            @include('nav', ['route' => $route])
            <!-- main -->
            
            <div class="main-content">
            @if(session('status'))
                <div class="alert {{ session('error') ? 'alert-danger' : 'alert-success' }}">
                    @if(session('error'))
                        <strong>Error: </strong>
                    @endif
                    {{ session('status') }}
                </div>
            @endif
            <div class="users" >

<form action="/Materiel/Reseau/update/traitement/{{$Reseau->id}}" method="post" enctype="multipart/form-data" >
    @csrf
       
        
    <div style="text-align: center; padding-bottom: 20px;"><h4 ><b>Modifier un materiel reseau</b></h4></div>




<div class="row">
  
  <div class="col-4">
    <div class="form-group">
      <label for="Marque" class="required" ><strong>{{ __('Marque') }}</strong></label>
      <select name="Marque" class="form-control  @error('Marque') is-invalid @enderror " id="Marque">
        <option value="">Choisir un Marque</option>
        @foreach($Marque_tables as $Marque)
            <option value="{{ $Marque->id }}" {{ old('Marque', $Reseau->Marque->id ?? null) == $Marque->id ? 'selected' : '' }}>
                {{ $Marque->Marque_Nom }}
            </option>
            @endforeach
      </select>
      @error('Marque')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group" >
      <label for="Model" ><strong>{{ __('Model') }}</strong></label>
      <select name="Model" class="form-control @error('Model') is-invalid @enderror " id="Model">
        <option value="">Choisir un Model</option>
        @foreach($Model_tables as $Model)
        <option value="{{ $Model->id }}" {{ old('Model', $Reseau->Model->id ?? null) == $Model->id ? 'selected' : '' }}>
        @endforeach
      </select>
      @error('Model')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

    </div>
  </div>
  <div class="col-4">
    <div class="form-group" >
      <label for="N°_de_serie"  ><strong>{{ __('N° de serie') }}</strong> </label>
      <input type="text" name="N°_de_serie" class="form-control @error('N°_de_serie') is-invalid @enderror" id="N°_de_serie" placeholder="N°_de_serie" value="{{ $Reseau->N°_de_serie}}" >
      @error('N°_de_serie')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div>





<div class="row">
<div class="col-4">
    <div class="form-group ">
        <label for="Nom" ><strong>{{ __('Nom') }}</strong></label>
        <input type="text" name="Nom" class="form-control @error('Nom') is-invalid @enderror" id="Nom" placeholder="Nom" value="{{ $Reseau->Nom}}" >
        @error('Nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
                <div class="col-4">
    <div class="form-group" >
      <label for="Addresse_MAC"><strong>{{ __('Addresse_MAC ') }}</strong></label>
      <input type="text" name="Addresse_MAC" class="form-control" id="Addresse_MAC" placeholder="Addresse_MAC" value="{{ $Reseau->Addresse_MAC}}" >
  
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Localisation"><strong>{{ __('Localisation ') }}</strong></label>
      <input type="text" name="Localisation" class="form-control" id="Localisation" placeholder="Localisation"  value="{{ $Reseau->Localisation}}" >
   
    </div>
  </div>
 

 
</div> 
<!-- ----------------------------- -->
<div class="row">
<div class="col-4">
    <div class="form-group ">
        <label for="Conf_Details" ><strong>{{ __('Configuration') }}</strong></label>
        <input type="text" name="Conf_Details" class="form-control @error('Conf_Details') is-invalid @enderror" id="Conf_Details" placeholder="Configuration" value="{{ $Reseau->Conf_Details}}" >
        @error('Conf_Details')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-4">
    <div class="form-group ">
        <label for="Addresse_IP" ><strong>{{ __('Addresse IP') }}</strong></label>
        <input type="text" name="Addresse_IP" class="form-control @error('Addresse_IP') is-invalid @enderror" id="Addresse_IP" placeholder="Addresse_IP" value="{{ $Reseau->Addresse_IP}}" >
        @error('Addresse_IP')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
</div>

                    
           
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn btn-secondary" style="text-decoration: none !important; color: white; "><a href="/Materiel/Reseau">{{ __('Annuler') }}</a></button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>



             
                </div>
            </div>
         </div>
</form>
</div>
  </div>
  @push('scripts')
      <script src="{{ asset('/js/users.js')}}"></script>
      <script src="{{ asset('/js/virtual-select.min.js')}}"></script>

      @endpush
    @endsection