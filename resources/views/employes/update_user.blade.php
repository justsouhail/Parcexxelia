@extends('layouts.app')



    @section('content')
    @push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
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

<form action="/Employes/update/{{$employe->id}}" method="post" enctype="multipart/form-data" >
    @csrf

    <div style="text-align: center; padding-bottom: 20px;"><h4 ><b>Modifier un utilisateur</b></h4></div>



                
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <label for="nom"><strong>{{ __('Nom') }}</strong> </label>
                    <input type="text" name="Nom" class="form-control @error('Nom') is-invalid @enderror" id="nom" placeholder="Nom" value="{{$employe->Nom}}">
                    @error('Nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="nom"> <strong>{{ __('Prenom') }}</strong></label>
                    <input type="text" name="Prenom" class="form-control @error('Prenom') is-invalid @enderror" id="Prenom" placeholder="Prenom" value="{{$employe->Prenom}}">
                    @error('Prenom')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <label for="nom"><strong> {{ __('CIN') }}</strong></label>
                    <input type="text" name="CIN" class="form-control @error('CIN') is-invalid @enderror" id="CIN" placeholder="CIN" value="{{$employe->CIN}}">
                    @error('CIN')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="Service"><strong>{{ __('Service') }}</strong></label>
                                <select name="Service" class="form-control @error('Service') is-invalid @enderror" id="Service">
                                    <option value="">Select a service</option>
                                    @foreach($services_tables as $service)
                                        <option value="{{ $service->id }}" {{ old('Service') == $employe->service_id ? 'selected' : '' }}>{{ $service->Nom }}</option>
                                    @endforeach
                                </select>
                                @error('Service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        

              
                   
                   
              
                    
           
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                      <button type="submit" class="btn btn-primary">Mise á jour</button>
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