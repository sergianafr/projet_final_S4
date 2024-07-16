<section class="my-3">
    <div class="container">
        <div class="row mb-3">
            <h1>Liste des devis</h1>

            <p class="alert alert-danger" id="errorMsg"></p>
            <p class="alert alert-success" id="successMsg"></p>
        </div>
        <div class="row g-4 ">
            <?php foreach ($devis as $key => $value) { ?>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body bg-light">
                            <h3 class="card-title text-dark">Detail du devis</h5>
                                <div class="container">
                                    <div class="nav-item d-inline">
                                        <h4 class="d-inline">
                                            <p class="text-dark"> du : <?= $value['date_rdv'] ?></p>
                                        </h4>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Service</th>
                                                <th>Slot</th>
                                                <th>Prix</th>
                                                <th>Date Payement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $value['matricule'] ?></td>
                                                <td><?= $value['libelle_service'] ?></td>
                                                <td><?= $value['libelle_slot'] ?></td>
                                                <td><?= $value['prix_service'] ?> Ar</td>
                                                <td><?= $value['pay_day'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <form data-key="<?= $key ?>" action="<?= site_url("devis/payement") ?>" method="POST" class="">
                                        <!-- Input hidden ( id ) -->
                                        <input type="hidden" name="id_devis">
                                        <div class="row">
                                            <div class="form-floating col">
                                                <input type="hidden" id="id_rdv_<?= $key ?>" name="id_rdv" value="<?= $value['id_rdv'] ?>">
                                                <input type="date" id="pay_day_<?= $key ?>" name="pay_day" class="form-control" id="payementInput" required>
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
    <script>
        function submit(id_rdv, pay_day) {
            $.ajax({
                url: '<?= site_url('devis/payement') ?>',
                type: 'POST',
                data: {
                    id_rdv: id_rdv,
                    pay_day: pay_day
                },
                success: function(response) {
                    $('#successMsg').html('Payement effectue avec succes. Les changements seront pris en compte apres le rafraichissement de la page.');
                    $('#errorMsg').html('');
                },
                error: response => {
                    const data = JSON.parse(response.responseText)
                    $('#errorMsg').html(data.errors);
                    $('#successMsg').html('');
                }
            });
        }

        function verify_pay_day(id_rdv, pay_day) {
            $.ajax({
                url: '<?= site_url('devis/verify_pay_day') ?>',
                type: 'POST',
                data: {
                    id_rdv: id_rdv,
                    pay_day: pay_day
                },
                success: function(response) {
                    const data = JSON.parse(response)
                    console.log(data)
                    if (data.status === 'no') {
                        $('#errorMsg').html('La date de payement doit etre superieur ou egale a la date du rendez-vous.');
                        $('#successMsg').html('');
                    } else if (data.status === 'ok') {
                        submit(id_rdv, pay_day)
                    }
                },
                error: response => {
                    const data = JSON.parse(response.responseText)
                    $('#errorMsg').html(data.errors)
                }
            });
        }

        $('form').submit(function(e) {
            e.preventDefault();
            const id_rdv = +$(this).find('#id_rdv_' + $(this).data('key')).val();
            const pay_day = $(this).find('#pay_day_' + $(this).data('key')).val();

            $('#errorMsg').html('');
            $('#successMsg').html('');
            verify_pay_day(id_rdv, pay_day)
        });
    </script>
</section>