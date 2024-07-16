<section id="hero_section" class="my-3">
    <div class="container">
        <div class="row mb-3">
            <h1 class="text-center text-primary">Liste des devis</h1>
                <p class="alert alert-danger d-none" id="errorMsg"></p>
                <p class="alert alert-success d-none" id="successMsg"></p>
            <hr>
        </div>
        <div class="row">
            <?php foreach( $value as $key => $value){ ?>
            <div class="col-sm-12 mb-3" >
                <div class="card p-2">
                    <div class="card-body">
                        <h3 class="card-title text-dark">Detail devis</h5>
                    </div>
                    <div class="container">
                        <div class="nav-item d-inline"><h4 class="d-inline"> <p class="text-dark"> au : <?= $value['date_rdv'] ?></p></h4>  </div>
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
                            <?php if($value['pay_day'] == null){ ?>
                            <form data-key="<?= $key ?>" action="<?= site_url("devis/payement") ?>" method="POST" class="p-2">
                            <div class="d-flex justify-content-end gap-2">
                                <div class="form-floating">
                                        <input type="hidden" id="id_rdv_<?= $key ?>" name="id_rdv" value="<?= $value['id_rdv'] ?>">
                                        <input type="date" id="pay_day_<?= $key ?>" name="pay_day" class="form-control" id="payementInput" required>
                                        <label for="payementInput">Date de payement</label>
                                    </div>
                                    <div class="">
                                        <input type="submit" class="btn btn-primary h-100" value="Payement">
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
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
                    document.getElementById('successMsg').classList.replace('d-none','d-block');
                    document.getElementById('errorMsg').classList.replace('d-block','d-none');
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
                        document.getElementById('errorMsg').classList.replace('d-none','d-block');
                        document.getElementById('successMsg').classList.replace('d-block','d-none');
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