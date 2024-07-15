<?php 
$this->load->helper('url');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <link href="<?php echo base_url('/css/styles.css"')?> rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
    <div class="wrap">
    <div id="header">
        <a href="/"><img src="<?php echo base_url('assets/images/logo.ico'); ?>" alt="logo" /></a>
        <ul id="navigation">
            <li><?php echo anchor(base_url(), 'Accueil'); ?></li>
            <li><a href="<?php echo site_url('Welcome/services'); ?>">services</a></li> 
            <li><?php echo anchor('contact', 'Contact'); ?></li> 
        </ul>
    </div><!-- end header -->