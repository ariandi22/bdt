<div class="container-fluid" style="min-height: 600px;">

<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa fa-navicon"></i> Manage Menus 
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

    	<div class="col-md-4">
    		<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-file-text"></i> Pages</h3>
                </div>
                <div class="panel-body">

                	<?php foreach($kategori as $obj) { ?>
                    <div class="checkbox">
					  <label><input type="checkbox" name="ck" class="cekbox" value="<?= $obj->category ?>"><?= $obj->category ?></label>
					</div>
					<?php } ?>

                    <hr>
                    <p class="p-info text-info"><i class="fa fa-info-circle"></i> by default, pages would saved to active. Don't check it if your want make this pages visible for public</p>
                </div>
                <div class="panel-footer text-right">
                    <button id="addmenu" type="submit" class="btn btn-default btn-sm">add to menu</button> 
                </div>
            </div>
    	</div>

    	<div class="col-md-8">
    		<form method="post" action="<?= base_url('menu/insert') ?>">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title">Menu Structure <small>Add menu from left panels</small></h3>
    			</div>
    			<div class="panel-body dragmenu">
    				<p><small class="text-danger"><i class="fa fa-info-circle"></i> This only support for one level menu. If you know how to make this feature to support multi level menus, please make pull request on our github.</small>
    				</p>

    				<ul id="draggable-menu" class="menu">
    					<?php foreach($menu as $a) { ?>
    					<li class="item list-group-item"><?= $a['menu'] ?> <span class="remove pull-right">x</span><input type="hidden" name="kat[]" value="<?= $a['menu'] ?>"></li>
    					<?php } ?>
					</ul>

    			</div>
    			<div class="panel-footer text-right">
    				<a id="reset" style="cursor: pointer;"><small>reset</small></a>&nbsp&nbsp&nbsp
    				<button type="submit" class="btn btn-primary btn-sm">Save Menu</button>
    			</div>
    		</div>
    		</form>
    	</div>

    </div>

</div>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

 <script>
 	$(document).ready(function () {
	  	$('#draggable-menu').sortable({
	        // cancel: '.remove',
	        items: '.item',
	        //placeholder: 'sortable-placeholde',
	    });

	    $('.item .remove').on('click', function () {
	        $(this).closest('.item').remove();
	    })
	});
  </script>

  <script type="text/javascript">
  	$('#addmenu').click(function() {
  		$('input[name="ck"]:checked').each(function() {
   			$('#draggable-menu').append('<li class="item list-group-item">'+this.value+' <span class="remove pull-right">x</span><input type="hidden" name="kat[]" value="'+this.value+'"></li>');
   			$('.cekbox').attr('checked', false);
		});
  	});

  	$("#draggable-menu").on("click", ".remove", function() {
  		$(this).parent().remove();
	});

  	$('#reset').click(function(){
  		$('.item').remove();
  	});
  </script>