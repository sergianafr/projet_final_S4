<section class="container my-4">
    <div class="row">
        <div class="col-lg-7">
            <img class="img-fluid" src="<?= base_url('assets/images/pexels-maltelu-2244746.jpg') ?>" alt=".matlelu">
        </div>
        <div class="col-lg-5">
            <div class="w-75 mx-auto">
                <form action="<?= site_url('rendez_vouz/prendre_rendez_vous') ?>" method="post">
                    <div class="text-center">
                        <h1>Prendre rendez-vous</h1>
                    </div>
                    <hr class="p-2">
                    <p class="text-danger" id="errorMsg"></p>

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
                                <option value="<?= $value['id'] ?>"><?= $value['libelle'] ?></option>
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
        function save_rdv(id_client, date_rdv, date_prise_rdv, id_type_service, id_slot) {
            $.ajax({
                url: '<?= site_url('rendez_vous/save_rdv') ?>',
                type: 'POST',
                data: {
                    id_client: id_client,
                    date_rdv: date_rdv,
                    date_prise_rdv: date_prise_rdv,
                    id_type_service: id_type_service,
                    id_slot: id_slot
                },
                success: (response) => {
                    const data = JSON.parse(response);
                    window.location.href = data.url;
                },
                error: response => {
                    const data = JSON.parse(response.responseText)
                    $('#errorMsg').html(data.errors)
                }
            });
        }

        $('form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= site_url('rendez_vous/verify') ?>',
                type: 'POST',
                data: {
                    date_rdv: $('#date_input').val(),
                    heure_rdv: $('#heure_input').val(),
                    service: $('#service_input').val()
                },
                success: (data) => {
                    if (data.status === 'impossible') {
                        $('#errorMsg').html('Aucun slot libre pour cet heure de ce jour');
                    } else if (data.status === 'success') {
                        save_rdv(
                            data.id_client, data.date_rdv, data.date_prise_rdv,
                            data.id_type_service, data.id_slot
                        );
                    }
                },
                error: (err) => console.error(err)
            });
        });
    </script>
</section>