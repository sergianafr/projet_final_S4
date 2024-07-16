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
                <div class="form-floating">
                    <select name="client" class="form-select" id="clientInput">
                        <?php foreach($clients as $key => $client) { ?>
                            <option value="<?=$key?>"><?=$client?></option>
                        <?php } ?>
                    </select>
                    <label for="clientInput"></label>
                </div>
                <div class="form-floating mb-3">
                        <!-- Input Service -->
                        <select name="service" id="serviceInput" class="form-select" required>
                            <option value="">Choisir un service</option>
                            <?php foreach( $services as $key => $value ) { ?>
                                <option value="<?=$key?>"><?=$value?></option>
                            <?php } ?>
                        </select>
                        <label for="serviceInput">Service</label>
                    </div>
                    <!-- Input heure -->
                    <div class="form-floating mb-3">
                        <input
                            type="time" class="form-control" name="heure" 
                            min="<?=$heure_debut?>"
                            max="<?=$heure_fin?>" 
                            id="heure_input"
                            required
                        >
                        <label for="heure_input">Heure</label>
                    </div class="mb-3">

            </form>
        </div>
        <div class="modal-footer">
            <button type="button"   id="rdv_button" class="btn btn-primary">Enregister</button>
            <button type="button"   id="cancel_button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
        </div>
    </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var date_calendar = document.getElementById('ModalTitle');
    var  modalForm = document.getElementById('modalForm');
    var cancel_button = document.getElementById('cancel_button').addEventListener('click',function(e){
        e.preventDefault();
        modalForm.classList.remove('show');
        modalForm.classList.replace('d-block','d-none')
    });
    var rdv_button = document.getElementById('rdv_button').addEventListener('click',function(e){
        e.preventDefault();
    });
    // Recuperation du calendrierDOM
    var calendarEl = document.getElementById('calendar');
    // Creation d'un objet calendrier
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    // Event on click
    calendar.on('dateClick', function(info) {
        date_calendar.innerHTML = info.dateStr
        modalForm.classList.add('show');
        modalForm.classList.replace('d-none','d-block');
    });
    // Faire le rendu du calendrier
    calendar.render();
    });
</script>