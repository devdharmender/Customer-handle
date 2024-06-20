<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/uploads/img/lappy-favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <img src="<?php echo base_url(); ?>assets/uploads/img/lappy-maker-logo.png" alt="logo error" width="75%" class="brand-text font-weight-light">
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?=base_url('admin/home')?>" class="d-block">
                    <?php
                        $admin = $this->session->userdata('admin');echo $admin['name'];
                    ?>
                </a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/home/index" class="nav-link">
                            <i class="fa-solid fa-house-user"></i>
                        <p> Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/follow_up/index" class="nav-link">
                        <i class="fa-solid fa-comments"></i>
                        <p> Follow Up</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/appointment/index" class="nav-link">
                        <i class="fa-solid fa-handshake-simple"></i>
                        <p> Appointment</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/wrong_no/index" class="nav-link ">
                        <i class="fa-solid fa-circle-xmark"></i>
                        <p> Wrong No</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/no_response/index" class="nav-link ">
                    <i class="fa-solid fa-phone-slash"></i>
                        <p> No response</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/not_interested/index" class="nav-link ">
                        <i class="fa-solid fa-handshake-slash"></i>
                        <p> Not interested</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/home/self_visit" class="nav-link ">
                    <i class="fa fa-blind" aria-hidden="true"></i>
                        <p> Self Visit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/call_back/index" class="nav-link ">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                        <p> call Back</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>admin/home/future" class="nav-link ">
                    <i class="fa fa-foursquare" aria-hidden="true"></i>
                        <p>Future Option</p>
                    </a>
                </li>
                <!-- 
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                    </ul>

                </li> -->
            </ul>
        </nav>

    </div>

</aside>