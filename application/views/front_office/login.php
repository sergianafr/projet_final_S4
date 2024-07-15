<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    <title>Login Front-Office</title>
</head>
<style>
</style>
<body class="bg-primary">
<div class="bg-primary" id="background-level"></div>
<div class="container col-xl-10 col-xxl-8 px-4 py-5 ">

    <div class="row align-items-center g-lg-5 py-5">
        <!-- FORM CONTAINER -->
      <div class="col-md-10 mx-auto col-lg-10">
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="<?=site_url('front_office/auth_client')?>">
        <div class="mb-3 text-center">
            <h2>Authentification client</h2>
        </div>
        <hr>
        <p class="text-danger" id="">Message d'erreur</p>

            <!-- MATRICULE (matricule)-->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingMatricule" name="matricule" placeholder="MT2357">
            <label for="floatingMatricule">Matricule</label>
          </div>
          <!-- TYPE DE VOITURE (type_voiture)-->
          <div class="form-floating mb-3">
            <select name="type_voiture" id="floatingType" class="form-select">
              <option value="">Choisir un type de voiture</option>
                <?php foreach( $types_voiture as $key => $type ) {?>
                    <option value="<?= $key ?>">
                        <?= $type ?>
                    </option>
                <?php } ?>
            </select>
            <label for="floatingType">Type de voiture</label>
          </div>
          <!-- VALIDATION -->
          <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
          <hr class="">
          <a href="<?=site_url('back_office/login')?>">Connect as admin</a>
        </form>
      </div>
      <!-- END FORM CONTAINER -->
       <!-- IMAGE CONTENT  -->
      <!-- <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Bienvenue dans le GARAGE</h1>
        <p class="col-lg-10 fs-4">Besoin de reparation , maintien , visite de votre vehicule vous etes au bonne endroit</p>
      </div> -->
    </div>
  </div>

<script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>