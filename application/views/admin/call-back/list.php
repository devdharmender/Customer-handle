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
                    <h1 class="m-0">Call Back</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/home/index"><i class="fa-solid fa-house-chimney"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/call_back/index">Call Back</a>
                        </li>
                        <li class="breadcrumb-item active">List</li>

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

            <?php
            if (!empty($this->session->flashdata('error'))) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! </strong><?php echo  $this->session->flashdata('error'); ?>
                </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <div class="form-inline">
                                    <form action="" id="searchFrm" name="searchFrm" method="get">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="q" value="<?php echo $queryString; ?>" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-sidebar" type="submit">
                                                <i class="fas fa-search fa-fw"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- <a href="<?= base_url(); ?>admin/follow_up/add"><button type="button" class="btn btn-block btn-primary">Add New</button></a> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">

                                <table class="table" style="height: 300px;">
                                    <thead>
                                        <tr>
                                            <th scope="col" width='100'>Name</th>
                                            <th scope="col" width='80'>Phone</th>
                                            <th scope="col" width='100'>Conversation</th>
                                            <th scope="col">Cust&nbsp;Address</th>
                                            <th scope="col">Issue</th>
                                            <th scope="col" width='150'>Date</th>
                                            <th scope="col" width='100' style="text-align: center;">Status
                                            </th>
                                            <th scope="col text-center" width='160' style="text-align: center;">Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($data)) {
                                            foreach ($data as $value) { ?>
                                                <tr>
                                                    <th scope="row"><a href="<?= base_url() . 'admin/call_back/view/' . $value['mid']; ?>"><?= substr($value['name'], 0, 30); ?></a>
                                                    </th>
                                                    <td><?= $value['phone']; ?></td>
                                                    <td><a tabindex="0"
                                                        class="btn  btn-primary" role="button" data-html="true" 
                                                        data-toggle="popover" 
                                                        data-placement="bottom" 
                                                        data-trigger="focus" 
                                                        title="<b>Conversation</b>" 
                                                        data-content="<div><?= $value['address']; ?></div>">Click</a></td>
                                                        <td><?= $value['cust_address']; ?></td>
                                                        <td><?= substr($value['issue'], 0, 70); ?></td>
                                                    <td><?= $value['date']; ?></td>
                                                    <td style="text-align: center;">
                                                    <?php
                                                        if ($value['status'] == 0) { ?>
                                                            <span class="badge rounded-pill bg-danger">No Status</span>
                                                        <?php } elseif ($value['status'] == 1) { ?>
                                                            <span class="badge rounded-pill bg-warning">Follow up</span>
                                                        <?php } elseif ($value['status'] == 2) { ?>
                                                            <span class="badge rounded-pill bg-success">Appointment</span>
                                                        <?php } elseif ($value['status'] == 3) { ?>
                                                            <span class="badge rounded-pill bg-danger">Wrong no.</span>
                                                        <?php } elseif ($value['status'] == 4) { ?>
                                                            <span class="badge rounded-pill bg-primary ">No response</span>
                                                        <?php } elseif ($value['status'] == 5) { ?>
                                                            <span class="badge rounded-pill bg-danger ">Not interested</span>
                                                        <?php } elseif ($value['status'] == 6) { ?>
                                                            <span class="badge rounded-pill bg-dark">call back</span>
                                                        <?php } else { ?>
                                                            <?= $value['status']; ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="action-items" style="text-align: center;">
                                                        <a href="https://api.whatsapp.com/send?phone=+91<?= $value['phone']; ?>&text=welcome_text@918273860105">
                                                            <button type="button" class="btn btn-block btn-success  btn-sm"><i class="fa-brands fa-whatsapp"></i></button>
                                                        </a>
                                                        <a href="<?= base_url() . 'admin/home/edit/' . $value['mid']; ?>">
                                                            <button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa-solid fa-pen-to-square logo-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="javascript:void(0);" onclick="deleteData(<?= $value['mid']; ?>)">
                                                            <button type="button" class="btn btn-block btn-danger btn-sm"><i class="fa-regular fa-trash-can logo-dlt"></i></button>
                                                        </a>
                                                        <a href="#">
                                                            <button type="button" class="btn btn-block btn-warning btn-sm" style="color: white;"><i class="fa-solid fa-share"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="7">
                                                    <h1>No data</h1>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-footer">

                            <div class="d-flex justify-content-between">
                                <?php
                                if ($queryString != '') { ?>
                                <a href="<?= $actual_link; ?>">
                                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                                        Back</button>
                                </a>
                                <?php } ?>
                                <?php
                                if ($queryString == '') {
                                    echo $pagination_links;
                                }
                                ?>
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

<script type="text/javascript">
    function deleteData(id) {
        // alert(id);
        if (confirm("Are you sure, You want to delete data ?")) {
            window.location.href = '<?= base_url() . "admin/call_back/delete/"; ?>' + id;

        }
    }
    $(function(){
    // Enables popover
    $("[data-toggle=popover]").popover();
});
</script>