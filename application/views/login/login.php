<?php $this->load->view('layout/head') ?>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <img src="<?php echo site_url("assets/images/Logo.jpg") ?>" width="150"/>
                <?php echo form_open("login/login"); ?>
                    <h1>Iniciar Sesión</h1>
                    <?php if(isset($error_message) && $error_message): ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <?php echo $error_message ?>
                        </div>
                    <?php elseif(isset($success_message) && $success_message): ?>
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <?php echo $success_message ?>
                        </div>
                    <?php endif ?>
                    <div>
                        <input type="text" name="username" class="form-control" placeholder="Usuario" required="" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required="" />
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success submit" value="Iniciar sesión" name="login">
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h6>Fundación Voluntariado Juan Pablo II</h6>
                            <p><?php echo @date('Y') ?></p>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </section>
        </div>


    </div>
</div>
</body>
</html>
