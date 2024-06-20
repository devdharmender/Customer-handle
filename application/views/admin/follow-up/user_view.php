<?php
$this->load->view('admin/common/header');
$this->load->view('admin/common/navbar');
$this->load->view('admin/common/sidebar');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="<?= $last_url; ?>">
                        <button type="button" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                            Back</button>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/home/index"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/follow_up/index">Follow Up</a></li>
                        <li class="breadcrumb-item active">User view</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <?php // print_r($view_data); 
                        ?>

                        <div class="card-header">
                            <div class=" d-flex justify-content-between  align-items-center">
                                <h3>Overview</h3>
                                <h4><b><?= $view_data['name']; ?></b> information</h4>
                            </div>
                        </div>
                        <div class="card-body px-2">
                            <div class="row px-5">
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Name:</b></h5>
                                    </span>
                                    <p class="d-flex"><?= $view_data['name']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Phone:</b></h5>
                                    </span>
                                    <p><?= $view_data['phone']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Email:</b></h5>
                                    </span>
                                    <p><?= $view_data['email']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>From Web:</b></h5>
                                    </span>
                                    <p><?= $view_data['from_web']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Address:</b></h5>
                                    </span>
                                    <p><?= $view_data['address']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Issue:</b></h5>
                                    </span>
                                    <p><?= $view_data['issue']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Select Product:</b></h5>
                                    </span>
                                    <p><?= $view_data['select_product']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Select Issue:</b></h5>
                                    </span>
                                    <p><?= $view_data['select_issue']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Location:</b></h5>
                                    </span>
                                    <p><?= $view_data['location']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Status:</b></h5>
                                    </span>
                                    <p>
                                        <?php
                                        if ($view_data['status'] == 0) { ?>
                                            <span class="badge rounded-pill bg-danger">No Status</span>
                                        <?php } elseif ($view_data['status'] == 1) { ?>
                                            <span class="badge rounded-pill bg-secondary">Follow up</span>
                                        <?php } elseif ($view_data['status'] == 2) { ?>
                                            <span class="badge rounded-pill bg-success">Appointment</span>
                                        <?php } elseif ($view_data['status'] == 3) { ?>
                                            <span class="badge rounded-pill bg-primary">Wrong no.</span>
                                        <?php } elseif ($view_data['status'] == 4) { ?>
                                            <span class="badge rounded-pill bg-warning ">No response</span>
                                        <?php } elseif ($view_data['status'] == 5) { ?>
                                            <span class="badge rounded-pill bg-info ">Not interested</span>
                                        <?php } elseif ($view_data['status'] == 6) { ?>
                                            <span class="badge rounded-pill bg-dark">call back</span>
                                        <?php } else { ?>
                                            <?= $view_data['status']; ?>
                                        <?php } ?>
                                    </p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Remark:</b></h5>
                                    </span>
                                    <p><?= $view_data['remark']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>F Id:</b></h5>
                                    </span>
                                    <p><?= $view_data['fid']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Date:</b></h5>
                                    </span>
                                    <p><?= $view_data['date']; ?></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <span>
                                        <h5><b>Update Date:</b></h5>
                                    </span>
                                    <p><?= $view_data['update_at']; ?> </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= $last_url; ?>">
                                <button type="button" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                                    Back</button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php
$this->load->view('admin/common/footer');
?>