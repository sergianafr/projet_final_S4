<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login Back-Office</title>
</head>
<body>
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <!-- IMAGE CONTENT  -->
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">GARAGE MECANO</h1>
        <p class="col-lg-10 fs-4">Bonjour cher mechano , met le turbo pour une journee tres vroom vromm </p>
      </div>
        <!-- FORM CONTAINER -->
      <div class="col-md-10 mx-auto col-lg-5">

        <form class="p-4 p-md-5 border rounded-3 bg-light">
            <!-- LOGIN -->
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="login_admin" placeholder="name@example.com">
            <label for="floatingInput">Login</label>
          </div>
          <!-- PASSWORD -->
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" name="mot_de_passe">
            <label for="floatingPassword">Mot de passe</label>
          </div>
          <!-- VALIDATION -->
          <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
        </form>
      </div>
    </div>
  </div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>