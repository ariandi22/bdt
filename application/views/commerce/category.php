<div class="panel panel-default pnl">
    <div class="panel-heading">
        <h3 class="panel-title">Category</h3>
    </div>
    <div class="panel-body">
   
        <div class="row">

        	<div class="col-md-5">
        		<form id="kategori" method="post" action="">
        		<div class="panel panel-default">
        			<div class="panel-body">
        				<div class="form-group">
        					<label>add category</label>
        					<input type="text" id="clear" name="category" class="form-control" required>
        				</div>
        			</div>
        			<div class="panel-footer text-right">
        				<button type="submit" id="submit" class="btn btn-primary btn-sm">add</button>
        				<button id="loading" class="btn btn-primary btn-sm" style="display: none;">
                            <i class="fa fa-spinner fa-spin"></i> adding..
                        </button>
        			</div>
        		</div>
        		</form>
        	</div>

        	<form id="hapus" method="post" action="">
        	<div class="col-md-7">
		        <table class="table table-condensed">
		        	<thead>
		        		<tr>
		        			<th width="85">#</th>
		        			<th>Category Name</th>
		        			<th>Action</th>
		        		</tr>
		        	</thead>
              <tfoot>
                <th><input type="checkbox" id="checkAll"/> Check All</th>
                <th></th>
                <th></th>
              </tfoot>
		        	<tbody id="ms">
		        		<?php foreach($cat as $obj) { ?>
		        		<tr class="old">
		        			<td><input type="checkbox" name="act[]" id="<?= $obj->id ?>" value="<?= $obj->id ?>"></td>
		        			<td><?= $obj->category_products ?></td>
		        			<td>
		        				edit
		        			</td>
		        		</tr>
		        		<?php } ?>
		        	</tbody>
		        </table>
                <div class="form-group text-right">
                    <button id="del" type="submit" class="btn btn-danger btn-sm">delete</button>
                    <button id="loading1" class="btn btn-default btn-sm" style="display: none;">
                        <i class="fa fa-spinner fa-spin"></i> deleting..
                    </button>
                </div>
		    </div>
            </form>
        </div> <!-- row -->

    </div>
</div>

<!-- submit data -->
<script type="text/javascript">

$('#kategori').submit(function(e) {
    e.preventDefault();
    $('#submit').hide();
    $('#loading').show();
    var me = $(this);
    // perform ajax
    $.ajax({
      url: "<?php echo base_url('commerce/addproductscategory') ?>",
      type: 'post',
      data: me.serialize(),
      dataType: 'json',
      success: function(res) {
        $('.old').remove();
        $.each(res, function(){
            $("#ms").append('<tr class="old"><td><input type="checkbox" id="'+this.id+'" value="'+this.id+'" name="act[]"></td><td>'+this.category_products+'</td><td>edit</td></tr>');
            $('#loading').hide();
            $('#submit').show();
            $('#clear').val('');
        });
        alert('category successfully added');
      }
    });
});
</script>

<!-- delete data -->
<script type="text/javascript">
$(document).ready(function(){
    
    $('#hapus').submit(function(k){
        var formData = $('#hapus').serialize();
        k.preventDefault();
        $.ajax({
        url: "<?php echo base_url('commerce/deleteproductscategory') ?>",
        type: 'post',
        data: formData,
        dataType: 'json',
        success: function(res) {
          $('.old').remove();
          $.each(res, function(){
              $("#ms").append('<tr class="old"><td><input type="checkbox" id="'+this.id+'" value="'+this.id+'" name="act[]"></td><td>'+this.category_products+'</td><td>edit</td></tr>');
          });
          alert('category successfully deleted');
        }
      });
    });

});
</script>

<!-- checkk all -->
<script type="text/javascript">
$("#checkAll").on('change' , function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>