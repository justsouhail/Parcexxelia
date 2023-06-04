<div style="padding-top: 9rem;">
            <form wire:submit.prevent="attribution" id="FormId">


                    {{-- STEP 1 --}}
                    @if($currentStep  == 1)
                <div class="step-one ">
                    <div class="card" style="width: 50rem;">
                        <div class="card-header bg-secondary text-white">ETAPE 1/3 - Categorie</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for=""><h4>Choisir Categorie</h4></label>
                                        <select class="form-control @error('Categorie') is-invalid @enderror" name="Categorie" wire:model="Categorie"     >
                                        <option value="" selected disabled style="color: red !important;"> Appuiyez ici pour selectionner une Categorie</option>
                                        @foreach($categorie_tables as $ct)
                                            <option value="{{ $ct->id }}" {!! old('Categorie') == $ct->id ? 'selected' : '' !!}>
                                              <strong style="color: black !important;">  {!! old('Categorie') == $ct->id ? '<strong>' . $ct->Categorie_Nom . '</strong>' : $ct->Categorie_Nom !!}</strong>
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                    <div class="text-danger">@error('Categorie'){{ $message }}@enderror</div>

                                    </div>
                                    <div class="action-buttons d-flex justify-content-between pt-2 pb-2">
                                    <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Suivant</button>
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
                    <div class="card" style="width: 50rem;">
                        <div class="card-header bg-secondary text-white">ETAPE 2/3 - Materiel</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for=""><h4> Choisir {{$tag}} </h4></label>
                                        <select class="form-control" wire:model="materiel">
                                        <option value="" selected disabled style="color: red !important;"> Appuiyez ici pour selectionnez {{$tag}}</option>
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
                                    <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Suivant</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                {{-- STEP 3 --}}
                @if ($currentStep == 3)

                <div class="step-one ">
                    <div class="card" style="width: 50rem;">
                        <div class="card-header bg-secondary text-white">ETAPE 3/3 - Utilisateur</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for=""><h4>Choisir  utilisateur</h4></label>
                                        <select class="form-control" wire:model="utilisateur">
                                        <option value="" selected disabled style="color: red !important;"> Appuiyez ici pour electionnez un utlisateur</option>
                                            @foreach($users as $dt)
                                            <option value="{{ $dt->id }}" {!! old('utilisateur') == $dt->id ? 'selected' : '' !!}>
                                                {{ $dt->Nom}} &nbsp; {{ $dt->Prenom}} 
                                            </option>



                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('utilisateur'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="action-buttons d-flex justify-content-between pt-2 pb-2">
                                    <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Precedent</button>
                                    <button type="submit"  class="btn btn-md btn-primary">Soumettre</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
</form>

</div>
