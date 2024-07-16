<section id="hero_section" class="my-3">
    <div class="container">
        <div class="row mb-3">
            <h2>Liste des services</h2>
            <?php if (isset($_GET['msg'])) { ?>
                <p class="alert alert-success"><?= $_GET['msg'] ?></p>
            <?php } ?>
        </div>
        <div class="row g-4 ">
            <?php foreach ($services as $key => $value) {
                $id = $value['id']; ?>
                <div class="col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-body bg-light">
                            <h4 class="card-title text-dark"><?= $value['libelle'] ?></h4>
                                <div class="container">
                                    <ul class="navbar-nav">
                                        <li class="nav-item d-inline">
                                            <p class="text-dark"> Duree : <?= $value['duree'] ?></p>
                                        </li>
                                        <li class="nav-item">
                                            <p class="text-dark"> Prix : <?= $value['prix'] ?> Ar</p>
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?= site_url("service/modifier?id_service=$id") ?>" class="btn btn-primary">Modifier</a>
                                <a href="<?= site_url("service/supprimer?id_service=$id") ?>" class="btn btn-outline-secondary">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-sm-12 col-lg-4">
                <a href="<?= site_url("service/formulaire") ?>" class="btn btn-outline-light card h-100 w-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-center h-100">
                            <span class=" align-middle">
                                <i class="bi-plus fs-1"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>