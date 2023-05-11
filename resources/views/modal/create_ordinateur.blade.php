
<form action="/Ordinateur/traitement" method="post" enctype="multipart/form-data" >
    @csrf
       
        <div class="modal fade" id="AddOrdinateurModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un nouveau Ordinateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                
                <div class="modal-body">


<div class="row">
  <div class="col-4">
    <div class="form-group">
      <label for="Role" class="required"><strong>{{ __('Role') }}</strong> </label>
      <select name="Role" class="form-control  @error('Role') is-invalid @enderror" id="Role">
        <option value="">Choisir un Role</option>
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
      <label for="Service" ><strong>{{ __('Service') }}</strong></label>
      <select name="Service" class="form-control @error('Service') is-invalid @enderror"  id="Service">
        <option value="">Choisir un Service</option>
        @foreach($services_tables as $Service)
          <option value="{{ $Service->id }}" {{ old('Service') == $Service->id ? 'selected' : '' }}>{{ $Service->Nom }}</option>
        @endforeach
      </select>
      @error('Service')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
 
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Employes" ><strong>{{ __('Utilisateur') }}</strong></label>
      <select name="Employes" class="form-control @error('Employes') is-invalid @enderror " id="Employes">
        <option value="">Choisir un Employes</option>
        @foreach($Employes_tables as $Employes)
          <option value="{{ $Employes->id }}" {{ old('Employes') == $Employes->id ? 'selected' : '' }}>{{ $Employes->Nom }}&nbsp;{{ $Employes->Prenom }}</option>
          @endforeach
          </select>
          @error('Employes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
    </div>
  </div>
</div>



<div class="row">
  <div class="col-4">
    <div class="form-group">
      <label for="Type" class="required"><strong>{{ __('Type') }}</strong> </label>
      <select name="Type" class="form-control   @error('Type') is-invalid @enderror" id="Type">
        <option value="">Choisir un Type</option>
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
      <label for="Marque" class="required"><strong>{{ __('Marque') }}</strong></label>
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
      <label for="Model" class="required"><strong>{{ __('Model') }}</strong></label>
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
<div class="row">
  <div class="col-4">
    <div class="form-group" class="required">
      <label for="N°_de_serie"  class="required"><strong>{{ __('N° de serie') }}</strong> </label>
      <input type="text" name="N°_de_serie" class="form-control @error('N°_de_serie') is-invalid @enderror" id="N°_de_serie" placeholder="N°_de_serie" value="{{ old('N°_de_serie') }}">
      @error('N°_de_serie')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group ">
        <label for="Nom" class="required"><strong>{{ __('Nom d\'ordinateur') }}</strong></label>
        <input type="text" name="Nom" class="form-control @error('Nom') is-invalid @enderror" id="Nom" placeholder="Nom" value="{{ old('Nom') }}">
        @error('Nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


  <div class="col-4">
    <div class="form-group">
      <label for="RAM" class="required"><strong>{{ __('RAM') }}</strong> </label>
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
      <label for="Stockage" class="required"><strong>{{ __('Stockage (Go)') }}</strong></label>
      <input type="number" name="Stockage" class="form-control @error('Stockage') is-invalid @enderror" id="Stockage" placeholder="Stockage" value="{{ old('Stockage') }}">
      @error('Stockage')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Processeur" class="required"><strong>{{ __('Processeur') }}</strong></label>
      <select name="Processeur" class="form-control  @error('Processeur') is-invalid @enderror" id="Processeur">
        <option value="">Choisir un Processeur</option>
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
    <label for="Os" class="required"><strong>{{ __('Os') }}</strong></label>
    <select name="Os" class="form-control @error('Os') is-invalid @enderror" id="Os">
      <option value="">Choisir un Os</option>
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
      <label for="Nombre_de_moniteur" class="required"><strong>{{ __('Nombre de moniteur ') }}</strong></label>
      <input type="number" name="Nombre_de_moniteur" class="form-control @error('Nombre_de_moniteur') is-invalid @enderror" id="Nombre_de_moniteur" placeholder="Nombre_de_moniteur"value="{{ old('Nombre_de_moniteur') }}">
      @error('Nombre_de_moniteur')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Adresse_MAC" class="required"><strong>{{ __('Adresse MAC ') }}</strong></label>
      <input type="text" name="Adresse_MAC" class="form-control @error('Adresse_MAC') is-invalid @enderror" id="Adresse_MAC" placeholder="00-11-22-33-44-55" value="{{ old('Adresse_MAC') }}">
      @error('Adresse_MAC')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="col-4">
    <div class="form-group" class="required">
      <label for="Adresse_IP"  class="required"><strong>{{ __('Adresse IP ') }}</strong></label>
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
      <label for="Post"  class="required"><strong>{{ __('Post') }}</strong></label>
      <select name="Post" class="form-control @error('Post') is-invalid @enderror" id="Post"  >
        <option value="">Choisir un Post</option>
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
      <label for="Status"><strong>{{ __('Status ') }}</strong></label>
      <input type="text" name="Status" class="form-control " id="Status" placeholder="Status"  value="{{ old('Status') }}">
    </div>
  </div>
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
      <!-- <select name="Logiciel" class="form-control " id="Logiciel">
        <option value="">Choisir un Logiciel</option>
        @foreach($logiciel_tables as $Logiciel)
          <option value="{{ $Logiciel->id }}" {{ old('Logiciel') == $Logiciel->id ? 'selected' : '' }}>{{ $Logiciel->Logiciel_Nom }}</option>
        @endforeach
      </select> -->
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

  <div class="col-4">
    <div class="form-group">
      <label for="Moniteur"><strong>{{ __('Moniteur') }}</strong></label>
      <select name="Moniteur" class="form-control   " id="Moniteur">
        <option value="">Choisir un Moniteur</option>
        @foreach($Moniteur_tables as $Moniteur)
          <option value="{{ $Moniteur->id }}" {{ old('Moniteur') == $Moniteur->id ? 'selected' : '' }}>{{ $Moniteur->Moniteur_Nom }}</option>
        @endforeach
      </select>

    </div>
  </div>
  <div class="col-4">
    <div class="form-group">
      <label for="Logiciel"><strong>{{ __('Logiciels installés') }}</strong></label>

    </div>
  </div>
</div>

                    
           
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>



             
                </div>
            </div>
         </div>
</form>

