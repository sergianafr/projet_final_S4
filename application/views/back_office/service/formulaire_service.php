<?php
$id_service = 0;
$nom_service = "";
$prix_service = 0;
$duree_service = 1;
$action = "insertion";
$btn_text = "Ajouter";

if ($service != null) {
    $id_service = $service['id'];
    $action = "modification";
    $btn_text = "Modifier";

    $nom_service = $service['libelle'];
    $prix_service = $service['prix'];
    $duree_service = $service['duree'];
}
?>

<section id="hero_section" class="container">
    <h1><?= $btn_text ?> service</h1>
    <div class="row">
        <div class="col w-50 mx-auto">
            <form method="POST" action="<?= site_url("service/$action") ?>">
                <div class="form-floating mb-3">
                    <input required type="text" name="libelle" id="nomInput" class="form-control" value="<?= $nom_service ?>">
                    <label for="nomInput">Nom service</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="time" name="duree" id="dureeInput" class="form-control" value="<?= $duree_service ?>">
                    <label for="dureeInput">Duree (h)</label>
                </div>
                <div class="form-floating mb-3">
                    <input required type="number" min="0.0" step="0.1" name="prix" id="prixInput" class="form-control" value="<?= $prix_service ?>">
                    <label for="prixInput">Prix</label>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="id_service" value="<?= $id_service ?>">
                    <input class="btn btn-primary" type="submit" value="<?= $btn_text ?>">
                </div>
            </form>
        </div>
    </div>
</section>