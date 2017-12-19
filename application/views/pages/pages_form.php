<div class="container-fluid" style="min-height: 600px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-clipboard"></i> Add a Page 
                        </h3>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-tag"></i>  <a><?= $this->uri->segment(1); ?></a>
                            </li>
                            <li class="active">
                                <?= $this->uri->segment(2); ?>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
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
                </div>

    <div class="row">
        <div class="col-md-9">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        	    <div class="form-group">
                    <label for="varchar">Title <?php echo form_error('title') ?></label>
                    <input type="text" id="title" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
                </div>
                <div class="form-group">
                    <label for="lang">Language</label><br>
                    <select class="select-style" name="lang" id="lang">
                        <option selected="selected">ID</option>
                        <option>EN</option>
                    </select>
                </div>
        	    <div class="form-group">
                    <label for="content">Content <?php echo form_error('konten') ?></label>
                    <textarea class="editor" name="konten" id="konten"><?php echo $konten; ?></textarea>
                </div>

                    <input type="hidden" name="category" id="category" value="<?php echo $category; ?>" />
                    <input type="hidden" id="metasave" name="meta_desc" value="<?= $meta_desc ?>" />

                <?php if($button == 'Update') { ?>
                <div class="form-group">
                    <label for="tinyint">Status <?php echo form_error('status') ?></label>
                    <input type="text" id="status" name="status" class="form-control" value="<?= $status ?>" />
                </div>
                <?php } ?>

                <div class="form-group">
                    <label for="text-center">Feature Image <?php echo form_error('userfile') ?></label>
                    <input type="file" name="userfile" id="userfile" class="well well-sm">
                </div>
        	    <input type="hidden" name="id_pages" value="<?php echo $id_pages; ?>" /> 

        </div>

        <div class="col-md-3 pad">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-file-text"></i> <?= $button ?></h3>
                </div>
                <div class="panel-body">
                    <label class="checkbox-inline"><input type="checkbox" value="">Save to Draft</label>
                    <hr>
                    <p class="p-info text-info"><i class="fa fa-info-circle"></i> by default, pages would saved to active. Don't check it if your want make this pages visible for public</p>
                </div>
                <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary btn-sm"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('pages') ?>" class="btn btn-default btn-sm">Cancel</a>
                </div>
            </div>

        </form>

            <form id="kategori" method="post" action="<?= base_url('pages/addcategory') ?>">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-folder"></i> Add Category</h3>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <select id="ms" class="select-style">
                            <?php if($button == 'Update') { ?>
                                <option value="<?= $category ?>" selected="selected"><?= $category ?></option>

                                <?php foreach($kategori as $obj) { ?>
                                <?php if($category != $obj->category) { ?>
                                <option class="old" value="<?= $obj->category ?>"><?= $obj->category ?></option>
                                <?php } ?>
                                <?php } ?>

                            <?php } else { ?>
                                <option disabled selected>--select--</option>
                                <?php foreach($kategori as $obj) { ?>
                                <option class="old" value="<?= $obj->category ?>"><?= $obj->category ?></option>
                                <?php } ?>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input id="tos" type="text" class="form-control" name="category" placeholder="add new category" required>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="text-right">
                        <button id="submit" type="submit" class="btn btn-primary btn-sm">add</button>
                        <button id="loading" class="btn btn-primary btn-sm" style="display: none">
                            <i class="fa fa-spinner fa-spin"></i> adding..
                        </button>
                    </div>
                </div>
            </div>
            </form>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-firefox"></i> Meta Description</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">
                        <small><i class="fa fa-info-circle"></i> This will affected to meta description on detail pages.</small>
                    </div>
                    <div class="form-group">
                        <textarea id="meta" class="form-control" rows="4" placeholder="Meta description here"><?= $meta_desc ?></textarea>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script type="text/javascript">

    $('#ms').change(function() {
        var isi = $(this).val();
        $('#category').val(isi);
    });

    $('#meta').keyup(function() {
        var isi = $(this).val();
        $('#metasave').val(isi);
    });
</script>

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
            $('#category').val(this.category);
        });
        alert('category successfully added');
      }

    });
  });
</script>

<script type="text/javascript">
var base_url= '<?php echo base_url()?>';
tinymce.init({
  selector: '.editor',
  height: 350,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic image link | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | help',
  file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: ''+base_url+'/assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'File Library',
            width: 700,
            height: 400,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});
</script>