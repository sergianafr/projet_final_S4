<section id="hero_section" class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h2 class="text-center">Importation de donnee</h2>
            <form action="post">
                <div class="form-floating">
                    <input type="file" name="service_file" id="serviceInput">
                    <label for="serviceInput">Donnees des services</label>
                </div>
                <div class="form-floating">
                    <input type="file" name="travaux_file" id="travauxInput">
                    <label for="travauxInput">Donnees des travaux</label>
                </div>
                <div>
                    <input type="submit" value="Importer">
                </div>
            </form>
        </div>
    </div>
</section>