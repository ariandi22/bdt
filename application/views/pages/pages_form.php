<div class="container-fluid" style="min-height: 600px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <?php echo $button ?> a Page 
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

    <div class="row">
        <div class="col-md-9">

            <form action="<?php echo $action; ?>" method="post">
        	    <div class="form-group">
                    <label for="varchar">Title <?php echo form_error('title') ?></label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="content">Content <?php echo form_error('content') ?></label>
                    <textarea class="editor" name="content" id="content"><?php echo $content; ?></textarea>
                </div>
        	    <div class="form-group">
                    <label for="varchar">Category <?php echo form_error('category') ?></label>
                    <input type="text" id="test" class="form-control" name="category" id="category" placeholder="Category" value="<?php echo $category; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="tinyint">Status <?php echo form_error('status') ?></label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="varchar">Created By <?php echo form_error('created_by') ?></label>
                    <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="datetime">Created At <?php echo form_error('created_at') ?></label>
                    <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="varchar">Img <?php echo form_error('img') ?></label>
                    <input type="text" class="form-control" name="img" id="img" placeholder="Img" value="<?php echo $img; ?>" />
                </div>
        	    <input type="hidden" name="id_post" value="<?php echo $id_post; ?>" /> 
        	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        	    <a href="<?php echo site_url('pages') ?>" class="btn btn-default">Cancel</a>
    	   </form>

        </div>

        <div class="col-md-3 pad">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-folder"></i> Add category for this pages
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <select id="ms" class="selectpicker">
                            <option disabled selected>--select--</option>
                            <?php foreach($kategori as $obj) { ?>
                            <option class="old" value="<?= $obj->category ?>"><?= $obj->category ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <form id="kategori" method="post" action="<?= base_url('pages/addcategory') ?>">
                        <div class="form-group">
                            <input id="tos" type="text" class="form-control" name="category" placeholder="add new category">
                        </div>
                        <button id="submit" type="submit" class="btn btn-primary pull-right">add</button>
                        <button id="loading" class="btn btn-primary pull-right" style="display: none">
                            <i class="fa fa-spinner fa-spin"></i> adding..
                        </button>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-firefox"></i> Add meta for seo
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">
                        <small><i class="fa fa-info-circle"></i> This will affected to meta description on detail pages.</small>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="4" placeholder="Meta description here"></textarea>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $('#ms').change(function() {
        var isi = $(this).val();
        $('#test').val(isi);
    });
</script>

<!-- <script type="text/javascript">
        $('#frm').click(function(e){
        e.preventDefault();
        $('.sel').remove();
        var b = $('#tos').val();
        $('#ms').append('<option value="'+b+'">'+b+'</option>');
        $('#tos').val('');
  });
</script> -->

<script type="text/javascript">

    $('#kategori').submit(function(e) {

    e.preventDefault();
    $('#submit').hide();
    $('#loading').show();
    var me = $(this);
    // perform ajax
    $.ajax({
      url: me.attr('action'),
      type: 'post',
      data: me.serialize(),
      dataType: 'json',
      success: function(res) {
        $('.old').remove();
        $.each(res, function(){
            $("#ms").append('<option value="'+ this.category +'" selected="selected">'+ this.category +'</option>');
            $('#loading').hide();
            $('#submit').show();
            $('#tos').val('');
        });
        alert('category successfully added');
      }

    });
  });
</script>