<!-- debut Modal ajouter -->

<div class="modal fade" id="ajouter" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">AJOUTER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('ajouterclients') }}" method="POST"
                enctype="multipart/form-data">
             
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nom </label>
                        <input type="text" class="form-control" id="" name="name"
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">email </label>
                        <input type="text" class="form-control" id="" name="email"
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">mot de passe</label>
                        <input type="text" class="form-control" id="" name="password"
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">contact</label>
                        <input type="text" class="form-control" id="" name="contact"
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">adresse</label>
                        <input type="text" class="form-control" id="" name="adresse"
                            value="" required>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- fin modal ajouter -->