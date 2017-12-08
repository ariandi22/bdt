<div class="container-fluid" style="min-height: 600px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Seo
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
                    <h4>Search engine optimation</h4>
                    <table class="table table-striped">
                    <tbody>
                    <form action="<?= $action; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id; ?>" />
                     <tr>
                         <td class="t">Main Title</td>
                         <td><input type="text" class="form-control" name="site_title" placeholder="this title only for main url" value="<?= $site_title ?>"></td>
                     </tr>
                     <tr>
                         <td class="t">Description</td>
                         <td><input type="text" class="form-control" name="description" placeholder="meta Description" value="<?= $description ?>"></td>
                     </tr>
                     <tr>
                         <td class="t">Google Verification code</td>
                         <td><input type="text" class="form-control" name="g_verification" placeholder="Code for google Search Console" value="<?= $g_verification ?>"></td>
                     </tr>
                     <tr>
                         <td><button type="submit" class="btn btn-primary btn-sm">save changes</button></td>
                     </tr>
                     </form>
                    </tbody>
                    </table>
                 </div>
                 </div>
</div>