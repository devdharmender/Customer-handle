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
                    <h1 class="m-0">Wrong No</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/home/index"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/wrong_no/index">Wrong No</a></li>
                        <li class="breadcrumb-item active">Add New</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <?php
            if (!empty($this->session->flashdata('success'))) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong><?php echo  $this->session->flashdata('success'); ?>
                </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Online Store Visitors</h3>
                                <a href="javascript:void(0);">View Report</a>
                            </div>
                        </div> -->
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Data</h3>
                                </div>

                                <form action="<?php echo base_url(); ?>admin/home/add" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control <?php echo (form_error('name') != "") ? "is-invalid" : ""; ?>" id="name" placeholder="Enter name" value="<?php echo set_value('name'); ?>">
                                                </div>
                                                <?php echo form_error('name'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="tel" name="phone" class="form-control <?php echo (form_error('phone') != "") ? "is-invalid" : ""; ?>" id="phone" placeholder="Enter Phone no." value="<?php echo set_value('phone'); ?>">
                                                </div>
                                                <?= form_error('phone'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" class="form-control <?php echo (form_error('email') != "") ? "is-invalid" : ""; ?>" id="email" placeholder="Enter Valid email" value="<?php echo set_value('email'); ?>">
                                                </div>
                                                <?= form_error('email'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location">Location</label>
                                                    <textarea class="form-control" rows="3" name="location" placeholder="Write Your Location....."><?=set_value('location')?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="select">Status</label>
                                                    <select name="status" class="form-control" id="status">
                                                        <option value="0" <?php echo set_select('status', '0', TRUE); ?>>.....</option>
                                                        
                                                        <option value="1" <?php echo set_select('status', '1'); ?>>Follow up</option>
                                                        <option value="2" <?php echo set_select('status', '2'); ?>>Appointment</option>
                                                        <option value="3" <?php echo set_select('status', '3'); ?>>Wrong number</option>
                                                        <option value="4" <?php echo set_select('status', '4'); ?>>No response</option>
                                                        <option value="5" <?php echo set_select('status', '5'); ?>>Not interested</option>
                                                        <option value="6" <?php echo set_select('status', '6'); ?>>Call back</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter Your location"><?=set_value('address')?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Issue</label>
                                                    <textarea class="form-control" name="issue" rows="3" placeholder="Write Your Comment...."><?=set_value('issue')?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex flex-row justify-content-end">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<aside class="control-sidebar control-sidebar-dark">

</aside>
<?php
$this->load->view('admin/common/footer');
?>