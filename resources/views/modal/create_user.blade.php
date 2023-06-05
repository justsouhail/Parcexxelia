

<form action="/Employes/traitement" method="post" enctype="multipart/form-data" >
    @csrf
       
        <div class="modal fade" id="AddEmployesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un nouveau Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <label for="nom"><strong>{{ __('Nom') }}</strong> </label>
                    <input type="text" name="Nom" class="form-control @error('Nom') is-invalid @enderror" id="nom" placeholder="Nom">
                    @error('Nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="nom"> <strong>{{ __('Prenom') }}</strong></label>
                    <input type="text" name="Prenom" class="form-control @error('Prenom') is-invalid @enderror" id="Prenom" placeholder="Prenom">
                    @error('Prenom')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="nom"><strong> {{ __('Matricule') }}</strong></label>
                    <input type="text" name="CIN" class="form-control @error('CIN') is-invalid @enderror" id="CIN" placeholder="CIN">
                    @error('CIN')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                            </div>

                        </div>

             
           
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="Service"><strong>{{ __('Service') }}</strong></label>
                                <select name="Service" class="form-control @error('Service') is-invalid @enderror" id="Service">
                                    <option value="">------</option>
                                    @foreach($services_tables as $service)
                                        <option value="{{ $service->id }}" {{ old('Service') == $service->id ? 'selected' : '' }}>{{ $service->Nom }}</option>
                                    @endforeach
                                </select>
                                @error('Service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="Sage"><strong>{{ __('Sage') }}</strong></label>
                                <select name="Sage" >
                                    <option value="">------</option>
                                   
                                        <option value="Sagex3  v6" >Sagex3 v6</option>
                                        <option value="Sagex3 v11" >Sagex3 v11</option>
                                        <option value="Sagex3 v11 & Sagex3 v6">Sagex3 v11 & Sagex3 v6</option>

                        
                                </select>
                            
                            </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="Commun"><strong>{{ __('Commun') }}</strong></label>
                                <select name="Commun" >
                                    <option value="">------</option>
                                   
                                        <option value="Commun1" >Commun1</option>
                                        <option value="Commun2" >Commun2</option>
                                        <option value="Commun3" >Commun3</option>

                        
                                </select>
                            
                            </div>
</div>
  
                   
                   
              
                    
           
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn btn-secondary" >{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>



             
                </div>
            </div>
         </div>
</formweb