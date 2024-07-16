<section id="hero_section" class="my-3">
    <div class="container">
        <div class="row mb-3">
            <h1 class="text-center text-primary">Liste des devis</h1>
            <hr>
        </div>
        <div class="row">
            <?php foreach( $devis as $key => $value){ ?>
            <div class="col-sm-12 mb-3" >
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-dark">Detail devis</h5>
                    </div>
                    <div class="container">
                        <div class="nav-item d-inline"><h4 class="d-inline"> <p class="text-dark"> DATE rendez-vous : ##/##/##</p></h4>  </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Matricule</th>
                                        <th>Service</th>
                                        <th>Slot</th>
                                        <th>Prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>MTXXXX</td>
                                        <td>Standard</td>
                                        <td>A</td>
                                        <td>PRIX</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="<?=site_url("devis/payement")?>" method="post" class="p-2">
                                <!-- Input hidden ( id ) -->
                                <input type="hidden" name="id_devis">
                                <div class="d-flex justify-content-end gap-2">
                                    <div class="form-floating">
                                        <input type="date" name="date_payement" class="form-control" id="payementInput" required>
                                        <label for="payementInput">Date de payement</label>
                                    </div>
                                    <div class="">
                                        <input type="submit" class="btn btn-primary h-100" value="Payement">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>