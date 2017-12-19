
<div class="panel panel-default pnl">
    <div class="panel-heading">
        <h3 class="panel-title">Add New Products</h3>
    </div>
    <div class="panel-body">
        <div class="row">

		    <div class="form-group col-md-6">
		        <label>Product Name</label>
		        <input type="text" name="productname" class="form-control input-sm">
		    </div>

		    <div class="form-group col-md-6">
		        <label>Category</label><br>
		        <select class="select-style input-sm">
		        	<option selected="selected">--chosee--</option>
		        	<option>west tour</option>
		        	<option>east tour</option>
		        </select>
		    </div>

		    <div class="form-group col-md-12">
		        <label>Products Description</label>
		        <textarea class="edit" rows="4"></textarea>
		    </div>

		    <div class="form-group col-md-6">
		        <label>Quantity</label>
		        <input type="text" name="productname" class="form-control input-sm">
		    </div>

    	</div>
    </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary btn-sm">add</button>
    </div>
</div>

<script type="text/javascript">
var base_url= '<?php echo base_url()?>';
tinymce.init({
  selector: '.edit',
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