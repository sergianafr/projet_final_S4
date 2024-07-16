<section id="hero_section" class="container">
    <div class="row">
        <div class="col-lg-6 col-12 mx-auto">
            <form action="<?= site_url("back_office/slot") ?>" method="POST" class="p-2">
                <div class="d-flex gap-2">
                    <div class="form-floating w-50 ">
                        <input type="date" id="dateInput" name="date_filtre" class="form-control" required>
                        <label for="date_input">Date</label>
                    </div>
                    <div class="">
                        <input type="submit" class="btn btn-primary h-100" value="Filtrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class=" col-12 mx-auto">
        <table class="table">
            <thead>
                <tr>
                    <!-- La liste des slots -->
                    <?php foreach($slots as $index => $slot) { ?>
                        <th class="text-center"><?=$slot?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- La liste des slots -->
                    <?php foreach($voitures as $index => $voiture_list) { ?>
                        <td>
                            <?php foreach($voiture_list as $index => $voiture) { ?>
                                <ul style="list-style: none;" class="text-center">
                                    <!-- (MATRICULE DE LA VOITURE et Type de voiture) OU AUTRE INFORMATION -->
                                    <li><?=$voiture?></li>
                                </ul>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</section>