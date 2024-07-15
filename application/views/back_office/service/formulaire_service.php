<?php 

$id_service = 0;
$nom_service = "";
$prix_service = 0;
$duree_service = 1;
$action = "insertion";
$btn_text = "Enregistrer";

if ($service != null) {
    $action = "modification";
    $btn_text = "Modifier";
    // TODO : Attribution des attribut du service

}
?>


<section class="container">
    <h1>Formulaire de service</h1>
    <div class="row">
        <div class="col w-50 mx-auto">
            <form method="post" action="<?=site_url("back_office/service/$action")?>">
                <div class="form-floating mb-3">
                    <input type="text" name="nom" id="nomInput" class="form-control" value="<?=$nom_service?>">
                    <label for="nomInput">Nom service</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="time" name="durre" id="dureeInput" class="form-control" value="<?=$duree_service?>">
                    <label for="dureeInput">Duree (h)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" min="0.0" step="0.1" name="prix" id="prixInput" class="form-control">
                    <label for="prixInput">Prix</label>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="<?=$btn_text?>">
                </div>
            </form>
        </div>
    </div>
</section>