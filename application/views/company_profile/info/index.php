
<div class="container-fluid" style="min-height: 600px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Info <small> Main information about your company</small>
                        </h2>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-tag"></i>  <a href="index.html"><?= $this->uri->segment(1); ?></a>
                            </li>
                            <li class="active">
                                <?= $this->uri->segment(2); ?>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <?php if($this->session->userdata('message') <> '') {
                            echo '<div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
                                        .$this->session->userdata('message').
                                 '</div>';
                        } else {
                            '';
                        } ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <h4>About Us <?php echo anchor(site_url('admin/create_logo'), '+ add', 'class="btn btn-primary btn-xs"'); ?></h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($about)) {echo $this->empty;}?> 
                                    <?php foreach ($about as $a) { ?>
                                    <tr>
                                        <td><?= $a['title'] ?></td>
                                        <td>
                                            <?php if ($a['status'] != 0){ ?>
                                                <a href="#" class="label label-success label-xs">
                                                <?php echo 'Active'; ?>
                                                </a> 
                                                <?php } else { ?>
                                                <a href="#" class="label label-danger label-xs">
                                                <?php echo 'Inactive';} ?>
                                                </a>
                                        </td>
                                        <td><?= date('d-M-y h:i A', strtotime($a['created_at'])); ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/up_logo/').$a['id'] ?>"><i class="fa fa-edit"></i></a>  -  
                                            <a href="#" onClick="ConfirmDelete(<?= $a['id'] ?>)"><i class="fa fa-trash"></i></a>
                                            <script>
                                              function ConfirmDelete(id) {
                                                var iditem = id;
                                                if (confirm("Are you sure want to delete this?"))
                                                location.href='<?= base_url('admin/delete_logo/');?>'+ iditem;
                                              }
                                            </script>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h4>Why Us <a href="" class="btn btn-primary btn-xs">+ add</a></h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($about)) {echo $this->empty;}?> 
                                    <?php foreach ($about as $a) { ?>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->