<!-- jQuery -->
<script src="<?php echo base_url("vendors/jquery/dist/jquery.min.js"); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url("vendors/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url("vendors/fastclick/lib/fastclick.js"); ?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url("vendors/nprogress/nprogress.js"); ?>"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url("gentelella/js/custom.js"); ?>"></script>


<?php
if(isset($scripts)){
    foreach($scripts as $script) {
        $url = strpos($script, 'http') !== false ? $script : base_url($script);
        echo "<script src='$url'></script>";
    }
}
?>

<script src="<?php echo base_url("assets/js/main.js") ?>"></script>

<?php
    if(!isset($print_body_end) || $print_body_end)
        echo "</body>";
?>
</html>