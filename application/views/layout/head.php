<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RegMed</title>


    <!-- Bootstrap -->
    <link href="<?php echo base_url("vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url("vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url("vendors/animate.css/animate.min.css"); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("gentelella/css/custom.min.css"); ?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/main.css"); ?>" rel="stylesheet">

    <?php
    if(isset($links)){
        foreach($links as $link) {
            $url = strpos($link, 'http') !== false ? $link : base_url($link);
            echo "<link rel='stylesheet' href='$url' />";
        }
    }
    ?>
</head>