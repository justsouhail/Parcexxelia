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
            @include('nav')
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

<form action="/Materiel/Fixe/traitement" method="post" enctype="multipart/form-data" >
    @csrf
       
        
    <div style="text-align: center; padding-bottom: 20px;"><h4 ><b>Ajouter un Telephone fixe</b></h4></div>



<div class="row">
<div class="col-4">
    <div class="form-group" >
      <label for="N°_de_serie"  ><strong>{{ __('N° de serie') }}</strong> </label>
      <input type="text" name="N°_de_serie" class="form-control @error('N°_de_serie') is-invalid @enderror" id="N°_de_serie" placeholder="N°_de_serie" value="{{ old('N°_de_serie') }}">
      @error('N°_de_serie')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Marque" class="required" ><strong>{{ __('Marque') }}</strong></label>
      <select name="Marque" class="form-control  @error('Marque') is-invalid @enderror " id="Marque">
        <option value="">Choisir un Marque</option>
        @foreach($Marque_tables as $Marque)
          <option value="{{ $Marque->id }}" {{ old('Marque') == $Marque->id ? 'selected' : '' }}>{{ $Marque->Marque_Nom }}</option>
        @endforeach
      </select>
      @error('Marque')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Model" ><strong>{{ __('Model') }}</strong></label>
      <select name="Model" class="form-control @error('Model') is-invalid @enderror " id="Model">
        <option value="">Choisir un Model</option>
        @foreach($Model_tables as $Model)
          <option value="{{ $Model->id }}" {{ old('Model') == $Model->id ? 'selected' : '' }}>{{ $Model->Model_Nom }}</option>
        @endforeach
      </select>
      @error('Model')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

    </div>
  </div>
</div>

<!-- ----------------- -->

<!-- ----------------------------- -->

 <div class="row">
                <div class="col-4">
    <div class="form-group">
      <label for="Commentaire" ><strong>{{ __('Status') }}</strong></label>
      <input type="text" name="Commentaire" class="form-control @error('Commentaire') is-invalid @enderror" id="Commentaire" placeholder="Commentaire"value="{{ old('Commentaire') }}">
      @error('Commentaire')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="astreinte" ><strong>{{ __('astreinte téléphonique ') }}</strong></label>
      <input type="text" name="astreinte" class="form-control @error('s') is-invalid @enderror" id="astreinte"   value="{{ old('astreinte') }}">
      @error('astreinte')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group" >
      <label for="Adresse_IP"  ><strong>{{ __('Adresse IP ') }}</strong></label>
      <input type="text" name="Adresse_IP" class="form-control @error('Adresse_IP') is-invalid @enderror" id="Adresse_IP" placeholder="111.111.111.111"  value="{{ old('Adresse_IP') }}">
      @error('Adresse_IP')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div>


<div class="row">
                <div class="col-4">
    <div class="form-group" >
      <label for="Date_Achat"><strong>{{ __('Date_Achat ') }}</strong></label>
      <input type="date" name="Date_Achat" class="form-control" id="Date_Achat" placeholder="Date_Achat" value="{{ old('Date_Achat') }}">
  
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Cout"><strong>{{ __('Cout d\'achat  (DH)') }}</strong></label>
      <input type="number" name="Cout" class="form-control  " id="Cout" placeholder="Cout"  value="{{ old('Cout') }}">
   
    </div>
  </div>
  <div class="col-4">
    <div class="form-group" >
      <label for="Date_Installation"><strong>{{ __('Date_Installation ') }}</strong></label>
      <input type="date" name="Date_Installation" class="form-control" id="Date_Installation" placeholder="Date_Installation" value="{{ old('Date_Installation') }}">
  
    </div>
  </div>
</div> 

<div class="row">
                <div class="col-4">
    <div class="form-group">
      <label for="Autorisation" ><strong>{{ __('Autorisation') }}</strong></label>
      <input type="text" name="Autorisation" class="form-control @error('Autorisation') is-invalid @enderror" id="Autorisation" placeholder="Autorisation"value="{{ old('Autorisation') }}">
      @error('Autorisation')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  </div>



                    
           
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn btn-secondary" style="text-decoration: none !important; color: white; "><a href="/Materiel/Tel_fixe">{{ __('Annuler') }}</a></button>
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