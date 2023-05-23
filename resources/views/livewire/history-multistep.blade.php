<div style="padding-top: 6rem;" >
            <form wire:submit.prevent="history" >


                    {{-- STEP 1 --}}
                    @if($currentStep  == 1)
                <div class="step-one ">
                <div class="card " style="width: 50rem;">
                        <div class="card-header bg-secondary text-white">ETAPE 1/3 - Categorie</div>
                        <div class="card-body  bl " >
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for=""><h4 style="color: white;">Choisir Categorie</h4></label>
                                        <select class="form-control @error('Categorie') is-invalid @enderror" name="Categorie" wire:model="Categorie">
                                        <option value="" selected>Categorie</option>
                                        @foreach($categorie_tables as $ct)
                                            <option value="{{ $ct->id }}" {!! old('Categorie') == $ct->id ? 'selected' : '' !!}>
                                                {!! old('Categorie') == $ct->id ? '<strong>' . $ct->Categorie_Nom . '</strong>' : $ct->Categorie_Nom !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">@error('Categorie'){{ $message }}@enderror</div>

                                    </div>
                                    <div class="action-buttons d-flex justify-content-between pt-2 pb-2">
                                    <button type="button" class="btn btn-md btn-success custom-button" wire:click="increaseStep()">Suivant</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                {{-- STEP 2 --}}
                @if ($currentStep == 2)

                <div class="step-two ">
                <div class="card " style="width: 50rem;">
                        <div class="card-header bg-secondary text-white">ETAPE 2/3 - Materiel</div>
                        <div class="card-body  bl " >
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for=""><h4 style="color: white;"> Choisir {{$tag}} </h4></label>
                                        <select class="form-control" wire:model="materiel">
                                            <option value="" selected>{{$tag}}</option>
                                            @foreach($data1 as $dt)
                                            <option value="{{ isset($dt->id) ? $dt->id : '' }}" {!! old('materiel') == $dt->id ? 'selected' : '' !!}>
                                                    {{ isset($dt->Marque->Marque_Nom) ? $dt->Marque->Marque_Nom : '' }}
                                                    &nbsp; {{ isset($dt->Model->Model_Nom) ? $dt->Model->Model_Nom : '' }}
                                                    &nbsp; {{ isset($dt->N°_de_serie) ? $dt->N°_de_serie : '' }}
                                                </option>




                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('materiel'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="action-buttons d-flex justify-content-between pt-2 pb-2">
                                    <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Precedent</button>
                                    <button type="button" class="btn btn-md btn-success custom-button" wire:click="increaseStep()">Suivant</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                {{-- STEP 3 --}}
                @if ($currentStep == 3)


                <div class="step-two ">
                <div class="card " style="width: 50rem;">                <div class="card card-custom-height" style="width: 50rem;">
    <div class="card-header bg-secondary text-white"  style="margin-bottom: 1rem;">
        <div class="d-flex justify-content-between align-items-center">
            <span>Historique d'utilisation &nbsp; &nbsp; {{$tag}}</span>
            <button type="submit" class="btn btn-md btn-primary custom-button">Imprimer <span><img src="/images/icons8-printer-16.png" alt="" id="arrow"></span> </button>
        </div>
    </div>
    <div class="card-body  bl " >
        <div class="table-container">
            <table style="    background-color: #ddd;">
                <tr id="header">
                    <th>Date d'affectation</th>
                    <th>Utilisateur</th>
                </tr>
                @foreach($history as $hs) 
                <tr>
                    <td>{{$hs->date_affectation}}</td>
                    <td>{{$hs->employes->Nom}} {{$hs->employes->Prenom}}</td>
                </tr>
                @endforeach
              
             
                <!-- More table rows... -->
            </table>
        </div>
    </div>
</div>

</div>


                    </div>
                </div>
                @endif
</form>
</div>
