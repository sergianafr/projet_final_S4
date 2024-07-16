<section class="container my-4">
    <div class="row">
        <div class="col-lg-7">
            <img class="img-fluid" src="<?= base_url('assets/images/pexels-maltelu-2244746.jpg') ?>" alt=".matlelu">
        </div>
        <div class="col-lg-5">
            <div class="w-75 mx-auto">
                <form action="<?= site_url('rendez_vouz/prendre_rendez_vous') ?>" method="post">
                    <div class="text-center">
                        <h1>Prendre rendez-vouz</h1>
                    </div>
                    <hr class="p-2">
                    <!-- Input Date -->
                    <div class="form-floating mb-3">
                        <input type="date" name="date_rdv" id="date_input" class="form-control" required>
                        <label for="dateInput">Date de rendez-vouz</label>
                    </div>
                    <div class="form-floating mb-3">
                        <!-- Input Service -->
                        <select name="service" id="service_input" class="form-select" required>
                            <option value="">Choisir un service</option>
                            <?php foreach ($services as $key => $value) { ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php } ?>
                        </select>
                        <label for="serviceInput">Service</label>
                    </div>
                    <!-- Input heure -->
                    <div class="form-floating mb-3">
                        <input type="time" class="form-control" name="heure" min="<?= $heure_debut ?>" max="<?= $heure_fin ?>" id="heure_input" required>
                        <label for="heure_input">Heure</label>
                    </div class="mb-3">
                    <!-- Validation -->
                    <div class="d-flex justify-content-between">
                        <input id="fix_rdv" type="submit" class="btn btn-primary" value="Fixer le rendez-vous">
                        <a href="<?= site_url('rendez_vouz/devis_pdf') ?>" class="text-white btn btn-secondary">Devis-service.pdf</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('form').submit(function(e) {
            e.preventDefault();
            console.log("You defined a rdv");
            const date_rdv = $('#date_input').val();
            const heure_rdv = $('#heure_input').val();
            const service = $('#service_input').val()

            console.log(date_rdv)
            console.log(heure_rdv)
            console.log(service)

            $.ajax({
                url: '<?= site_url('rendez_vouz/verify') ?>',
                type: 'POST',
                data: {
                    date_rdv : date_rdv,
                    heure_rdv : heure_rdv,
                    service : service
                },
                success: (response) => {
                    const data = JSON.parse(response);
                    console.log(data);
                },
                error: (err) => console.error(err)
            });
        });
    </script>
</section>