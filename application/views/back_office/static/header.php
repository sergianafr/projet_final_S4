<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/font/bootstrap-icons.min.css')?>">
  <script src="<?= base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
  <link rel="stylesheet" href="<?=base_url('assets/css/specific.css')?>">
  <title>Back Office</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">.Logo</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link active" href="<?=site_url('back_office/home')?>">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('back_office/service')?>">Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('back_office/date_reference')?>">Date Reference</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('back_office/devis')?>">Devis</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('back_office/rendez_vous')?>">Rendez-vous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('back_office/donnees_csv')?>">Donnees</a>
      </li>
    </ul>
  </div>
  <div class="d-flex gap-2">
    <div>
      <a href="<?=site_url('back_office/reset_data')?>" class="btn btn-outline-danger">Supprimer base</a>
    </div>
    <div>
      <a href="" class="btn btn-outline-secondary">Deconnexion</a>
    </div>
  </div>
  </div>
</nav>