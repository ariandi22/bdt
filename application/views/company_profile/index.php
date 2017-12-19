
<div class="container-fluid" style="min-height: 600px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            General
                        </h3>
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
                 <div class="col-md-6">
                    <h4>Site identity</h4>
                    <table class="table table-striped">
                    <tbody>

                     <tr>
                         <td class="t">Site Title</td>
                         <td><input type="text" class="form-control" name=""></td>
                     </tr>
                     <tr>
                         <td class="t">Tagline</td>
                         <td><input type="text" class="form-control" name=""></td>
                     </tr>

                    </tbody>
                    </table>
                 </div>
                 </div>

                 <div class="row">
                    <div class="col-lg-6">
                        <h4>Header Logo <!-- <?php echo anchor(site_url('admin/create_logo'), '+ add', 'class="btn btn-primary btn-xs"'); ?> --></h4>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tbody>
                                    <?php if (empty($logo)) {echo $this->empty;}?> 
                                    <?php foreach ($logo as $a) { ?>
                                    <tr>
                                        <td><img src="<?= base_url().$a['img'];?>" class="img-responsive" width="75"></td>
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
                                        <td>
                                            <a class="btn btn-default btn-sm" href="<?= base_url('admin/up_logo/').$a['id'] ?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-default btn-sm" onclick="ConfirmDeletelogo(<?= $a['id'] ?>)"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <script type="text/javascript">
                                              function ConfirmDeletelogo(id) {
                                                if (confirm("Are you sure want to delete this?"))
                                                location.href='<?= base_url('admin/delete_logo/');?>'+ id;
                                              }
                                        </script>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h4>Favicon <?php echo anchor(site_url('admin/create_icon'), '+ add', 'class="btn btn-primary btn-xs"'); ?></h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <?php if (empty($icon)) {echo $this->empty;}?> 
                                    <?php foreach ($icon as $a) { ?>
                                    <tr>
                                        <td><img src="<?= base_url().$a['img'];?>" class="img-responsive" width="16"></td>
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
                                        <td>
                                            <a class="btn btn-default btn-sm" href="<?= base_url('admin/up_logo/').$a['id'] ?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-default btn-sm" href="#" onclick="ConfirmDelete(<?= $a['id'] ?>)"><i class="fa fa-trash"></i></a>
                                            <script>
                                              function ConfirmDelete(id) {
                                                var iditem = id;
                                                if (confirm("Are you sure want to delete this?"))
                                                location.href='<?= base_url('admin/delete_icon/');?>'+ iditem;
                                              }
                                            </script>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->