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

<form action="/Materiel/Moniteur/update/traitement/{{$Moniteur->id}}" method="post" enctype="multipart/form-data" >
    @csrf
       
        
    <div style="text-align: center; padding-bottom: 20px;"><h4 ><b>Modifier un moniteur</b></h4></div>




<div class="row">
  
<div class="col-4">
    <div class="form-group">
        <label for="Model"><strong>{{ __('Marque') }}</strong></label>
        <select name="Marque" class="form-control @error('Marque') is-invalid @enderror" id="Marque">
            <option value="">------</option>
            @foreach($Marque_tables as $Marque)
            <option value="{{ $Marque->id }}" {{ old('Marque', $Moniteur->Marque->id ?? null) == $Marque->id ? 'selected' : '' }}>
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
    <div class="form-group">
        <label for="Model"><strong>{{ __('Model') }}</strong></label>
        <select name="Model" class="form-control @error('Model') is-invalid @enderror" id="Model">
            <option value="">------</option>
            @foreach($Model_tables as $Model)
            <option value="{{ $Model->id }}" {{ old('Model', $Moniteur->Model->id ?? null) == $Model->id ? 'selected' : '' }}>
                {{ $Model->Model_Nom }}
            </option>
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
      <input type="text" name="N°_de_serie" class="form-control @error('N°_de_serie') is-invalid @enderror" id="N°_de_serie" placeholder="N°_de_serie" value="{{ $Moniteur->N°_de_serie}}" >
      @error('N°_de_serie')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div>





<div class="row">
<div class="col-4">
    <div class="form-group ">
        <label for="resolution" ><strong>{{ __('Resolution') }}</strong></label>
        <input type="text" name="resolution" class="form-control @error('resolution') is-invalid @enderror" id="resolution" placeholder="resolution" value="{{ $Moniteur->resolution}}" >
        @error('resolution')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
                <div class="col-4">
    <div class="form-group" >
      <label for="Date_Achat"><strong>{{ __('Date_Achat ') }}</strong></label>
      <input type="date" name="Date_Achat" class="form-control" id="Date_Achat" placeholder="Date_Achat" value="{{ $Moniteur->Data_achat}}" >
  
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Cout"><strong>{{ __('Cout d\'achat  (DH)') }}</strong></label>
      <input type="number" name="Cout" class="form-control  " id="Cout" placeholder="Cout"  value="{{ $Moniteur->Cout}}" >
   
    </div>
  </div>
 

 
</div> 
<!-- ----------------------------- -->


                    
           
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn btn-secondary" style="text-decoration: none !important; color: white; "><a href="/Materiel/Moniteur">{{ __('Annuler') }}</a></button>
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