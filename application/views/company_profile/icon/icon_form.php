<div class="container-fluid" style="min-height: 600px;">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <i class="fa fa-edit"></i> <?php echo $button ?> icon
            </h2>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> <?= $button ?>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

    	    <div class="form-group">
                <label for="varchar">Icon <?php echo form_error('userfile') ?></label>
                <input type="file" name="userfile" id="userfile" class="text-center well well-sm" />
            </div>

            <?php if($button == 'Update') { ?>
    	    <div class="form-group">
                <label for="tinyint">Status <?php echo form_error('status') ?></label>
                <select name="status" class="form-control">
                    <?php if($status != 0){ ?>
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    <?php }else{?>
                        <option value="1">Active</option>
                        <option value="0" selected>Inactive</option>
                    <?php }?>
                </select>
            </div>
            <?php } ?>

    	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    	    <button type="submit" id="submit" class="btn btn-primary"><?php echo $button ?></button>
            <button class="btn btn-primary" id="loading" style="display: none;"><i class="fa fa-spinner fa-spin fa-fw"></i>uploading..</button>
    	    <a href="<?php echo site_url('admin/list_header') ?>" class="btn btn-default">Cancel</a>
	    </form>
        </div>
    </div>

</div>

<script type="text/javascript">
    $('#submit').click(function(){
        $('#submit').hide();
        $('#loading').show();
    });
</script>