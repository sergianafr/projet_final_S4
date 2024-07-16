<section id="hero_section" class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h2 class="text-center">Importation de donnee</h2>
            <form action="<?=site_url('back_office/import_files')?>">
                <!-- SERVICE (NOT REQUIRED) -->
                <div class="mb-3">
                    <label for="serviceInput">Donnees des services</label>
                    <input type="file" name="service_file" id="serviceInput" class="form-control">
                </div>
                <!-- TRAVAUX (NOT REQUIRED) -->
                <div class="mb-3">
                    <label for="travauxInput">Donnees des travaux</label>
                    <input type="file" class="form-control" name="travaux_file" id="travauxInput">
                </div>
                <div>
                    <input type="submit" value="Importer" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</section>