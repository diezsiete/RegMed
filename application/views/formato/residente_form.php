<?php
$this->load->view('layout/header_formato_form', [
    'links' => ['vendors/flatpickr/flatpickr.min.css'],
    'form_open_multipart' => true,
]);
?>

    <?php $this->load->view('residente/residente_form_inputs') ?>

<?php $this->load->view('layout/footer_formato_form', ['scripts' => [
    'vendors/flatpickr/flatpickr.min.js',
    'vendors/flatpickr/es.js',
]]) ?>