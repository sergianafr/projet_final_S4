<section id="hero_section" class="my-3 container">

    <div class="row">
        <div class="col-3 w-50 mx-auto text-center">
            <h1 class="text-primary">Date de reference actuelle</h1>
            <h2><?= $date_actuelle ?></h2>
            <form method="POST" action="<?= site_url('date_reference/modifier') ?>">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" name="date_reference" id="dateInput" required>
                    <label for="dateInput">Nouvelle date reference</label>
                </div>
                <div>
                    <input type="submit" value="Modifier" class="btn btn-primary w-100">
                </div>
            </form>
        </div>
    </div>
</section>