<section class="my-3">
    <div class="container">
        <div class="row mb-3">
            <h1>Liste des services</h1>
        </div>
        <div class="row g-4 ">
            <?php foreach( $devis as $key => $value){ ?>
            <div class="col-sm-12" >
                <div class="card">
                    <div class="card-body bg-light">
                    <h3 class="card-title text-dark">Detail devis</h5>
                    <div class="container">
                            <div class="nav-item d-inline"><h4 class="d-inline"> <p class="text-dark"> DATE RENDEZ-VOUZ : ##/##/##</p></h4>  </div>
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
                            <form action="<?=site_url("devis/payement")?>" method="post" class="">
                                <!-- Input hidden ( id ) -->
                                <input type="hidden" name="id_devis">
                                <div class="row">
                                    <div class="form-floating col">
                                        <input type="date" name="date_payement" class="form-control" id="payementInput" required>
                                        <label for="payementInput">Date de payement</label>
                                    </div>
                                    <div class="col">
                                        <input type="submit" class="btn btn-success h-100" value="Payement">
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