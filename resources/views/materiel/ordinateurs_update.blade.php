@extends('layouts.app')


    @section('content')

    @push('css')
    
    <link rel="stylesheet" href="/css/nav_sidebar.css">
    <link rel="stylesheet" href="/css/ordinateur_update.css">
    <link rel="stylesheet" href="/css/virtual-select.min.css" />


     @endpush
     <input type="checkbox" id="menu-toogle">
             <!-- sidebar -->

             @include('sidebar')
            <!-- navbar -->
            @include('nav', ['route' => $route])

            <!-- main -->
            <div class="main-content" >

                <div class="users">
                <form action="/Materiel/Ordinateur/update/traitement/{{ $ordinateurs->id }}" method="post" enctype="multipart/form-data" >
    @csrf

    <div style="text-align: center; padding-bottom: 20px;"><h4 ><b>Mise á jour  d'ordinateur</b></h4></div>
               <div class="row">
               <div class="col-4">
               <div class="form-group">
    <label for="Role" class="required"><strong>{{ __('Role') }}</strong></label>
    <select name="Role" class="form-control @error('Role') is-invalid @enderror" id="Role">
        <option value="">------</option>
        @foreach($Roles_tables as $Role)
            <option value="{{ $Role->id }}" {{ $Role->id == $ordinateurs->Role->id ? 'selected' : '' }}>
                {{ $Role->Role_Nom }}
            </option>
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
        <option value="">------</option>
        @foreach($Moniteur_tables as $Moniteur)
          <option value="{{ $Moniteur->id }}" {{ old('Moniteur') == $Moniteur->id ? 'selected' : '' }}>{{ $Moniteur->Moniteur_Nom }}</option>
        @endforeach
      </select>

    </div>
  </div>

  <div class="col-4">
    <div class="form-group">
      <label for="Status"><strong>{{ __('Status ') }}</strong></label>
      <input type="text" name="Status" class="form-control " id="Status" placeholder="Status"  value="{{ $ordinateurs->Status }}">
    </div>
  </div>


</div>



<div class="row">
  <div class="col-4">
    <div class="form-group">
      <label for="Type" class="required"><strong>{{ __('Type') }}</strong> </label>
      <select name="Type" class="form-control   @error('Type') is-invalid @enderror" id="Type">
        <option value="">------</option>
        @foreach($Type_tables as $Type)
          <option value="{{ $Type->id }}" {{ $Type->id == $ordinateurs->type_id ? 'selected' : '' }}>
            {{ $Type->Type_Nom }}</option>
        @endforeach
      </select>
      @error('Type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Marque" class="required"><strong>{{ __('Marque') }}</strong></label>
      <select name="Marque" class="form-control  @error('Marque') is-invalid @enderror " id="Marque">
        <option value="">------</option>
        @foreach($Marque_tables as $Marque)
          <option value="{{ $Marque->id }}" {{ $Marque->id == $ordinateurs->marque_id ? 'selected' : '' }} >{{ $Marque->Marque_Nom }}</option>
        @endforeach
      </select>
      @error('Marque')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Model" class="required"><strong>{{ __('Model') }}</strong></label>
      <select name="Model" class="form-control @error('Model') is-invalid @enderror " id="Model">
        <option value="">------</option>
        @foreach($Model_tables as $Model)
          <option value="{{ $Model->id }}" {{ $Model->id == $ordinateurs->model_id ? 'selected' : '' }}>{{ $Model->Model_Nom }}</option>
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
    <div class="form-group" class="required">
      <label for="N°_de_serie"  class="required"><strong>{{ __('N° de serie') }}</strong> </label>
      <input type="text" name="N°_de_serie" class="form-control @error('N°_de_serie') is-invalid @enderror" id="N°_de_serie" placeholder="N°_de_serie" value="{{$ordinateurs->N°_de_serie}}">
      @error('N°_de_serie')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group ">
        <label for="Nom" class="required"><strong>{{ __('Nom d\'ordinateur') }}</strong></label>
        <input type="text" name="Nom" class="form-control @error('Nom') is-invalid @enderror" id="Nom" placeholder="Nom" value="{{$ordinateurs->Nom }}">
        @error('Nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


  <div class="col-4">
    <div class="form-group">
      <label for="RAM" class="required"><strong>{{ __('RAM') }}</strong> </label>
      <input type="number" name="RAM" class="form-control @error('RAM') is-invalid @enderror" id="RAM" placeholder="RAM" value="{{ $ordinateurs->RAM }}">
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
      <label for="Stockage" class="required"><strong>{{ __('Stockage (Go)') }}</strong></label>
      <input type="number" name="Stockage" class="form-control @error('Stockage') is-invalid @enderror" id="Stockage" placeholder="Stockage" value="{{ $ordinateurs->Stockage }}">
      @error('Stockage')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Processeur" class="required"><strong>{{ __('Processeur') }}</strong></label>
      <select name="Processeur" class="form-control  @error('Processeur') is-invalid @enderror" id="Processeur">
        <option value="">------</option>
        @foreach($Processeur_tables as $Processeur)
          <option value="{{ $Processeur->id }}" {{  $Processeur->id == $ordinateurs->processeur_id ? 'selected' : ''}}>{{ $Processeur->Processeur_Nom }}</option>
        @endforeach
      </select>
      @error('Processeur')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

    </div>
  </div>
  <div class="col-4">
  <div class="form-group">
    <label for="Os" class="required"><strong>{{ __('Os') }}</strong></label>
    <select name="Os" class="form-control @error('Os') is-invalid @enderror" id="Os">
      <option value="">------</option>
      @foreach($Os_tables as $Os)
        <option value="{{ $Os->id }}" {{ $Os->id == $ordinateurs->os_id ? 'selected' : ''}}>
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
      <label for="Nombre_de_moniteur" class="required"><strong>{{ __('Nombre de moniteur ') }}</strong></label>
      <input type="number" name="Nombre_de_moniteur" class="form-control @error('Nombre_de_moniteur') is-invalid @enderror" id="Nombre_de_moniteur" placeholder="Nombre_de_moniteur"value="{{ $ordinateurs->Nb_Moniteur}}">
      @error('Nombre_de_moniteur')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Adresse_MAC" class="required"><strong>{{ __('Adresse MAC ') }}</strong></label>
      <input type="text" name="Adresse_MAC" class="form-control @error('Adresse_MAC') is-invalid @enderror" id="Adresse_MAC" placeholder="00-11-22-33-44-55" value="{{ $ordinateurs->Addresse_MAC }}">
      @error('Adresse_MAC')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group" class="required">
      <label for="Adresse_IP"  class="required"><strong>{{ __('Adresse IP ') }}</strong></label>
      <input type="text" name="Adresse_IP" class="form-control @error('Adresse_IP') is-invalid @enderror" id="Adresse_IP" placeholder="255.255.255.255" value="{{ $ordinateurs->Addresse_IP }}">
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
      <input type="date" name="Date_Achat" class="form-control" id="Date_Achat" placeholder="Date_Achat" value="{{ $ordinateurs->Date_Achat }}">
  
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Cout"><strong>{{ __('Cout d\'achat  (DH)') }}</strong></label>
      <input type="number" name="Cout" class="form-control  " id="Cout" placeholder="Cout"  value="{{  $ordinateurs->Cout }}">
   
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Post"  class="required"><strong>{{ __('Post') }}</strong></label>
      <select name="Post" class="form-control @error('Post') is-invalid @enderror" id="Post"  >
        <option value="">------</option>
        @foreach($Post_tables as $Post)
          <option value="{{ $Post->id }}" {{  $Post->id == $ordinateurs->post_id ? 'selected' : ''}}>{{ $Post->Post_Nom }}</option>
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
                        <option value="{{ $Logiciel->id }}" {{  $Logiciel->id == $ordinateurs->Logiciel_id ? 'selected' : ''  }}>{{ $Logiciel->Logiciel_Nom }}</option>
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

                    
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" id="boutton" class="btn btn-primary">Mise á jour</button>
</div>

                </form>
                </div>
                </div>
      
   

            
      @push('scripts')
      <script src="{{ asset('/js/users.js')}}"></script>
      <script src="{{ asset('/js/virtual-select.min.js')}}"></script>

      @endpush

    

        
        
@endsection