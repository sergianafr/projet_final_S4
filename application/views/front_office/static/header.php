<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/font/bootstrap-icons.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/specific.css')?>">
  <script src="<?= base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
  <title>Front Office</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <span class="navbar-brand">.Logo</span>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link active" href="<?=site_url('front_office/home')?>">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=site_url('front_office/rendez_vous')?>">rendez-vous</a>
        </li>
      </ul>
    </div>
    <div>
      <a class="btn btn-outline-secondary" href="<?= site_url('front_office/login') ?>">Deconnexion</a>
    </div>
  </div>
</nav>