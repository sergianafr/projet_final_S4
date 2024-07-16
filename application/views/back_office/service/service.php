<section id="hero_section" class="my-3">
    <div class="container">
        <div class="row mb-3">
            <h2>Liste des services</h2>
        </div>
        <div class="row g-4 ">
            <?php foreach( $services as $key => $value){ ?>
            <div class="col-sm-12 col-lg-4" >
                <div class="card">
                    <div class="card-body bg-light">
                    <h4 class="card-title text-dark">Nom service</h4>
                    <div class="container">
                        <ul class="navbar-nav">
                            <li class="nav-item d-inline"><p class="text-dark"> Duree : 2h30</p>  </li>
                            <li class="nav-item"><p class="text-dark"> Prix  : 300.000Ar</p></li>
                        </ul>
                    </div>
                    <a href="<?=site_url("service/modifier?id_service=1")?>" class="btn btn-primary">Modifier</a>
                    <a href="<?=site_url("service/supprimer?id_service=$key")?>" class="btn btn-outline-secondary">Supprimer</a>
                </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-sm-12 col-lg-4" >
                <a href="<?=site_url("service/formulaire")?>" class="btn btn-outline-light card h-100 w-100">
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