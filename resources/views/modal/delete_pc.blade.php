<div class="modal fade" id="deletePCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


        </button>
      </div>
      <div class="modal-body">
        Vous voulez supprimer ce ordinateur ??
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>

        <a href="/Materiel/Ordinateur/delete/{{$ordinateur->id}}"><button type="button" class="btn btn-primary">Confirmer</button></a>
    </div>
    
    </div>
  </div>
</div> 

