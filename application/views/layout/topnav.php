<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="col-xs-3  col-sm-1">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            </div>
            <div class="hidden-xs col-sm-5 col-md-5">
            <div class="form-group top_search nav">
                <form action="<?php echo site_url('residente/buscar') ?>" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar residente..." name="query">
                        <!-- current_url() -->
                        <input type="hidden" name="prev_page" value="<?php echo uri_string() ?>">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Buscar</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
            <div class="col-xs-9 col-sm-6 col-md-6">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo base_url("assets/images/default-profile.png"); ?>" alt="">
                            <?php echo $this->session->userdata['login']['id'] ?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="<?php echo site_url('/usuario/modificar-pass') ?>"> Modificar contraseña</a></li>
                            <li><a href="<?php echo site_url('/login/logout'); ?>">
                                    <i class="fa fa-sign-out pull-right"></i> Cerrar sesión
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>