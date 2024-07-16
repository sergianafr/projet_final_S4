<?php
$events = json_encode($rdv, JSON_PRETTY_PRINT);
?>
<section id="hero_section" class="container my-3">
    <div id="calendar"></div>
    <!-- Modal -->
    <div class="modal fade d-none" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitle"></h5>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-floating mb-3">
                            <select name="client" class="form-select" id="client_input">
                                <option value="">Choisir le matricule</option>
                                <?php foreach ($clients as $key => $client) { ?>
                                    <option value="<?= $client['id'] ?>"><?= $client['num_matricule'] ?></option>
                                <?php } ?>
                            </select>
                            <label for="clientInput"></label>
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
                            <input type="time" class="form-control" name="heure" 
                                min="<?= $heure_debut ?>" max="<?= $heure_fin ?>" 
                                id="heure_input" required>
                            <label for="heure_input">Heure</label>
                        </div class="mb-3">
                        <input type="submit" id="rdv_button" class="btn btn-primary" value="Enregistrer">
                        <button type="button" id="cancel_button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function submit() {
        const id_client = +$('#client_input').val();
        const id_type_service = +$('#service_input').val();
        const heure = $('#heure_input').val();

        console.log(id_client);
        console.log(id_type_service);
        console.log(heure);
    }

    $('form').submit(function(e) {
        e.preventDefault();
        submit();
    });

    document.addEventListener('DOMContentLoaded', function() {
        var date_calendar = $('#ModalTitle');
        var modalForm = document.getElementById('modalForm');
        var cancel_button = document.getElementById('cancel_button').addEventListener('click', function(e) {
            e.preventDefault();
            modalForm.classList.remove('show');
            modalForm.classList.replace('d-block', 'd-none')
        });

        // Recuperation du calendrierDOM
        var calendarEl = document.getElementById('calendar');

        // Creation d'un objet calendrier
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prevYear,prev,next,nextYear today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: <?= $events ?>
        });

        // Event on click
        calendar.on('dateClick', function(info) {
            date_calendar.innerHTML = info.dateStr
            modalForm.classList.add('show');
            modalForm.classList.replace('d-none', 'd-block');
        });
        // Faire le rendu du calendrier
        calendar.render();
    });
</script>