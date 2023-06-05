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

<form action="/Materiel/Ordinateur/traitement" method="post" enctype="multipart/form-data" >
    @csrf
       
        
    <div style="text-align: center; padding-bottom: 20px;"><h4 ><b>Ajouter un ordinateur</b></h4></div>


<div class="row">
  <div class="col-4">
    <div class="form-group">
      <label for="Role" class="required"><strong>{{ __('Role') }}</strong> </label>
      <select name="Role" class="form-control  @error('Role') is-invalid @enderror" id="Role">
        <option value="">----</option>
        @foreach($Roles_tables as $Role)
          <option value="{{ $Role->id }}" {{ old('Role') == $Role->id ? 'selected' : '' }}>{{ $Role->Role_Nom }}</option>
        @endforeach
      </select>
      @error('Role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
   
    </div>
  </div>



  <div class="col-4">
    <div class="form-group">
      <label for="Moniteur"><strong>{{ __('Moniteur') }}</strong></label>
      <select name="Moniteur" class="form-control   " id="Moniteur">
        <option value="">----</option>
        @foreach($Moniteur_tables as $Moniteur)
          <option value="{{ $Moniteur->id }}" {{ old('Moniteur') == $Moniteur->id ? 'selected' : '' }}>{{ $Moniteur->Moniteur_Nom }}</option>
        @endforeach
      </select>

    </div>
  </div>

  <div class="col-4">
    <div class="form-group">
      <label for="Status"><strong>{{ __('Commentaire ') }}</strong></label>
      <input type="text" name="Status" class="form-control " id="Status" placeholder="Status"  value="{{ old('Status') }}">
    </div>
  </div>
  </div>

<div class="row">
  <div class="col-4">
    <div class="form-group">
      <label for="Type" ><strong>{{ __('Type') }}</strong> </label>
      <select name="Type" class="form-control   @error('Type') is-invalid @enderror" id="Type">
        <option value="">----</option>
        @foreach($Type_tables as $Type)
          <option value="{{ $Type->id }}" {{ old('Type') == $Type->id ? 'selected' : '' }}>{{ $Type->Type_Nom }}</option>
        @endforeach
      </select>
      @error('Type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Marque" ><strong>{{ __('Marque') }}</strong></label>
      <select name="Marque" class="form-control  @error('Marque') is-invalid @enderror " id="Marque">
        <option value="">----</option>
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
        <option value="">----</option>
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
    <div class="form-group ">
        <label for="Nom" ><strong>{{ __('Nom d\'ordinateur') }}</strong></label>
        <input type="text" name="Nom" class="form-control @error('Nom') is-invalid @enderror" id="Nom" placeholder="Nom" value="{{ old('Nom') }}">
        @error('Nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


  <div class="col-4">
    <div class="form-group">
      <label for="RAM" ><strong>{{ __('RAM') }}</strong> </label>
      <input type="number" name="RAM" class="form-control @error('RAM') is-invalid @enderror" id="RAM" placeholder="RAM" value="{{ old('RAM') }}">
      @error('RAM')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>

</div>
<!-- ----------------- -->

                <div class="row">
                <div class="col-4">
    <div class="form-group">
      <label for="Stockage" ><strong>{{ __('Stockage (Go)') }}</strong></label>
      <input type="number" name="Stockage" class="form-control @error('Stockage') is-invalid @enderror" id="Stockage" placeholder="Stockage" value="{{ old('Stockage') }}">
      @error('Stockage')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Processeur" ><strong>{{ __('Processeur') }}</strong></label>
      <select name="Processeur" class="form-control  @error('Processeur') is-invalid @enderror" id="Processeur">
        <option value="">----</option>
        @foreach($Processeur_tables as $Processeur)
          <option value="{{ $Processeur->id }}" {{ old('Processeur') == $Processeur->id ? 'selected' : '' }}>{{ $Processeur->Processeur_Nom }}</option>
        @endforeach
      </select>
      @error('Processeur')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

    </div>
  </div>
  <div class="col-4">
  <div class="form-group">
    <label for="Os" ><strong>{{ __('Os') }}</strong></label>
    <select name="Os" class="form-control @error('Os') is-invalid @enderror" id="Os">
      <option value="">----</option>
      @foreach($Os_tables as $Os)
        <option value="{{ $Os->id }}" {!! old('Os') == $Os->id ? 'selected' : '' !!}>
          {!! old('Os') == $Os->id ? '<strong>' . $Os->Os_Nom . '</strong>' : $Os->Os_Nom !!}
        </option>
      @endforeach
    </select>
    @error('Os')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>

</div> 
<!-- ----------------------------- -->

 <div class="row">
                <div class="col-4">
    <div class="form-group">
      <label for="Nombre_de_moniteur" ><strong>{{ __('Nombre de moniteur ') }}</strong></label>
      <input type="number" name="Nombre_de_moniteur" class="form-control @error('Nombre_de_moniteur') is-invalid @enderror" id="Nombre_de_moniteur" placeholder="Nombre_de_moniteur"value="{{ old('Nombre_de_moniteur') }}">
      @error('Nombre_de_moniteur')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Adresse_MAC" ><strong>{{ __('Adresse MAC ') }}</strong></label>
      <input type="text" name="Adresse_MAC" class="form-control @error('Adresse_MAC') is-invalid @enderror" id="Adresse_MAC" placeholder="00-11-22-33-44-55" value="{{ old('Adresse_MAC') }}">
      @error('Adresse_MAC')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group" >
      <label for="Adresse_IP"  ><strong>{{ __('Adresse IP ') }}</strong></label>
      <input type="text" name="Adresse_IP" class="form-control @error('Adresse_IP') is-invalid @enderror" id="Adresse_IP" placeholder="255.255.255.255" value="{{ old('Adresse_IP') }}">
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
    <div class="form-group">
      <label for="Post"  ><strong>{{ __('Post') }}</strong></label>
      <select name="Post" class="form-control @error('Post') is-invalid @enderror" id="Post"  >
        <option value="">----</option>
        @foreach($Post_tables as $Post)
          <option value="{{ $Post->id }}" {{ old('Post') == $Post->id ? 'selected' : '' }}>{{ $Post->Post_Nom }}</option>
        @endforeach
      </select>
      @error('Post')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div> 
<!-- ----------------------------- -->
 <div class="row">
     
  <div class="col-4">
  <div class="form-group">
    <label for="Antivirus"><strong>{{ __('Antivirus installés') }}</strong></label>

    <select id="multipleSelect" multiple name="Antivirus[]"   data-search="false" placeholder="Choisir Antivirus "
                       data-silent-initial-value-set="true">
                       @foreach($Antivirus_tables as $Antivirus)
                        <option value="{{ $Antivirus->id }}" {{ in_array($Antivirus->id, old('Antivirus', [])) ? 'selected' : '' }}>{{ $Antivirus->Antivirus_Nom }}</option>
                      @endforeach
                        
                      </select>    
                      <script>
                    VirtualSelect.init({ 
                      ele: '#multipleSelect' 
                    });
                 
                 </script>
  
    @error('Antivirus')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
  <div class="col-4">
    <div class="form-group">
      <label for="Logiciel"><strong>{{ __('Logiciels installés') }}</strong></label>
     
      <select id="multipleSelect" multiple name="Logiciel[]"   data-search="false" placeholder="Choisir Logiciel "
                       data-silent-initial-value-set="true">
                       @foreach($logiciel_tables as $Logiciel)
                        <option value="{{ $Logiciel->id }}" {{ old('Logiciel') == $Logiciel->id ? 'selected' : '' }}>{{ $Logiciel->Logiciel_Nom }}</option>
                      @endforeach
                                      
                      </select>    
                      <script>
                    VirtualSelect.init({ 
                      ele: '#multipleSelect' 
                    });
                 
                 </script>

    </div>
  </div>
</div>

<!-- --- -->
<div class="row">



  </div>


                    
           
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn btn-secondary" style="text-decoration: none !important; color: white; "><a href="/Materiel/ordinateurs">{{ __('Annuler') }}</a></button>
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