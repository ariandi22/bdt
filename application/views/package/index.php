<style type="text/css">
.aksi a {
    font-size: 13px;
    color: #333;
}
</style>

<div class="container-fluid" style="min-height: 600px;">
	<div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa fa-shopping-cart"></i> Package
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

        <div class="col-md-12">
                        <?php 
                          if($this->session->flashdata('success') != null)
                                {
                                    ?>
                                    <div class="alert alert-success alert-dismissable">
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php
                                }
                            if($this->session->flashdata('fail') != null)
                                {
                                  ?>
                                    <div class="alert alert-danger alert-dismissable">
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <?php echo $this->session->flashdata('fail'); ?>
                                    </div>
                                    <?php
                                }

                        ; ?>
                    </div>

        <div class="col-md-3">
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			<h3 class="panel-title">Things to Do</h3>
        		</div>
        		<div class="panel-body">
        			<ul>
                    <li class="a"><a href="<?= base_url('commerce/add_package') ?>"><i class="fa fa-list"></i> List Package</a></li>

        			<li><a class="edt" href="<?= site_url('commerce/showaddpackage'); ?>"><i class="fa fa-edit"></i> Add Package</a></li>

                    <li><a class="edt" href="<?= site_url('commerce/showaddcategory'); ?>"><i class="fa fa-folder-o"></i> Manage Category</a></li>
        			</ul>
        		</div>
        	</div>
        </div>

        <div class="col-md-9">
            <div id="app-control">
        	<div class="panel panel-default pnl">
        		<div class="panel-heading">
        			<h3 class="panel-title">All Package</h3>
        		</div>
        		<div class="panel-body">
        			<table class="table table-condensed">
        				<thead>
        					<tr>
                                <th>Picture</th>
        						<th>Product Name</th>
        						<th>Status</th>
        						<th>Lang</th>
        						<th>Action</th>
        					</tr>
        				</thead>
        				<tbody>
                            <?php foreach($allpackage as $a) { ?>
        					<tr>
                                <td style="width: 70px;">
                                	<?php if($a['path'] != null) { ?>
                                    <img src="<?= base_url().$a['path']?>" class="img-responsive">
                                    <?php } else { ?>
                                    <img src="<?= base_url('assets/img/no-img.png')?>" class="img-responsive">
                                    <?php } ?>
                                </td>
        						<td><?= $a['name'] ?></td>
        						<td>
        							<?php if ($a['status'] != 0){ ?>
			                        <a href="#" class="btn btn-success btn-xs m-r-5">
			                        <?php echo 'Active'; ?>
			                        </a> 
			                        <?php } else { ?>
			                        <a href="#" class="btn btn-danger btn-xs m-r-5">
			                        <?php echo 'Inactive';} ?>
			                        </a>
        						</td>
        						<td><?= $a['lang']?></td>
        						<td class="aksi">
                                    <a class="btn btn-default btn-sm edt" href="<?= base_url('commerce/showEditPackage/').$a['id_package'] ?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default btn-sm" href="<?= base_url('commerce/deletepackage').'/'.$a['id_package'] ?>"><i class="fa fa-trash"></i></a>
        						</td>
        					</tr>
                            <?php } ?>
        				</tbody>
        			</table>

        		</div>
        	</div>
    </div> <!-- app control -->

    </div>
</div>

<script type="text/javascript">

    $('a.edt').click(function(e){
        $('#app-control').html('<span class="loading-animation">loading..</span>');
        var link = $(this).attr('href');
        e.preventDefault();
        $('.pnl').remove();
        $('#app-control').load(link, function(){
            $('.loading-animation').hide();
        });
    })
</script>