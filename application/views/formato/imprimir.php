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
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("gentelella/css/custom.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/main.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/imprimir.css"); ?>" rel="stylesheet">

</head>

<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <?php echo $formato->titulo ?>
                    <?php echo  $formato->getCodigo() ? "<small>".strtoupper($formato->getCodigo())."</small>" : "" ?>
                    <p class="lead pull-right">Fundación Juan Pablo II</p>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info page-sub-header">
            <div class="col-xs-4 invoice-col">
                <strong>Nombre</strong><br>
                <p><?php echo $residente->nombre ?></p>
            </div>
            <!-- /.col -->
            <div class="col-xs-4 invoice-col">
                <strong>Documento</strong><br>
                <p><?php echo $residente->tipo_documento . " " . $residente->cedula ?></p>
            </div>
            <!-- /.col -->
            <div class="col-xs-4 invoice-col">
                <strong>Fecha de nacimiento</strong><br>
                <p><?php echo $residente->fecha_nacimiento . " ( ".$residente->anos . " años )" ?></p>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <?php
                $this->load->view('formato/'.$formato->key.'_form')
            ?>
        </div>
        <!-- /.row -->

        <div class="row">

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>

<!-- jQuery -->
<script src="<?php echo base_url("vendors/jquery/dist/jquery.min.js"); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url("vendors/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>

</html>
