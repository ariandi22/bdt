<style type="text/css">
  #img_preview_td {
            width: 70px;
        }

        .prv {
            width: 145px;
            height: auto;
        }
</style>

<form method="post" action="<?= base_url('commerce/edit_destination') ?>" enctype="multipart/form-data">
<div class="panel panel-default pnl">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Destination</h3>
    </div>
    <div class="panel-body">
        <div class="row">
        	<input type="hidden" name="id_destination" value="<?= $edit['id_destination'] ?>">
		    <div class="form-group col-md-8">
		        <label>Destination Name</label>
		        <input type="text" name="destinationname" class="form-control" value="<?= $edit['name'] ?>">
		    </div>

		    <div class="form-group col-md-4">
		        <label>Language</label>
		        <select name="lang" class="selectpicker form-control">
		        	<option selected="selected" disabled>--</option>
		        	<?php if($edit['lang'] == 'ID') { ?>
		        		<option selected="selected">ID</option>
		        		<option>EN</option>
		        	<?php } else { ?>
		        	<option>EN</option>
		        	<option>ID</option>
		        	<?php } ?>
		        </select>
		    </div>

        <div class="form-group col-md-6">
            <label>Category</label>
            <select name="category" class="selectpicker form-control">
              <option selected="selected" disabled>--select--</option>
              <?php foreach($cat as $a) { ?>
              <option><?= $a['category_products'] ?></option>
              <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Status</label>
            <select name="status" class="selectpicker form-control">
              <option selected="selected" disabled>--select--</option>
              <?php if($edit['status']== 1) { ?>
                <option value="1" selected="selected">Active</option>
                <option value="0">Innactive</option>
              <?php } else { ?>
                <option value="0" selected="selected">Innactive</option>
                <option value="1">Active</option>
              <?php } ?>
            </select>
        </div>

    		<div class="form-group col-md-12">
    		    <label>Package Description</label>
    		    <textarea class="edit" name="konten" rows="4"><?= $edit['content']?></textarea>
    		</div>

        <div class="form-group col-md-12">
          <input class="form-control" type="hidden" name="code_destination" value="<?= $edit['code_destination'] ?>">
        </div>

        <div class="form-group col-md-12">
        	<div id="data_del">
          	
          	</div>
        </div>

        <div class="form-group col-md-12">
          <label>Featured Images</label>
          <div class="alert alert-info">
            <strong><i class="fa fa-info-circle"></i></strong> Your changes will never saved until you click save button
          </div>
        </div>

        <div class="form-group col-md-12">
          <button name="add_more_img" id="add_more_img" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> add image field</button>
        </div>

        <div class="form-group col-md-12">
          <table class="table table-stripped" id="dynamic_table_field">
          	<?php $i=0; foreach($img as $a) { ?>
          		<?php $i++ ?>

          		<tr id="row<?= $i ?>">
          			<td><button name="remove" id="<?= $i ?>" class="btn btn-danger btn-sm btn-remove-add" data-change="<?= $a['path'] ?>" data-id-img="<?= $a['id_img'] ?>">X</button>
          			</td>
          			<td><small>click to delete image</small></td>
          			<td id="img_preview_td"><img class="prv" src="<?= base_url().$a['path'] ?>" id="img_preview<?= $i ?>"/>
          			</td>
        		  </tr>

          	<?php } ?>
          </table>
        </div>

    	</div>
    </div>
    <div class="panel-footer text-right">
      <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
    </div>
</div>
</form>


<script type="text/javascript">
  $('.selectpicker').selectpicker({
        dropupAuto: false,
  });

  $(".btn-remove-add").click(function(e){
    e.preventDefault();
    // get details from selected field
    var bc = $(this).attr('data-change');
    var bd = $(this).attr('data-id-img');
    	$('#data_del').append('<input type="hidden" value="'+bc+'" name="data_del[]" class="form-control"><input type="hidden" value="'+bd+'" name="id_img[]" class="form-control">');
    // remove selected field
    var button_id = $(this).attr("id");
    $("#row"+button_id+"").remove();

  });

$(document).ready(function(){

        var i = 3;
        $("#add_more_img").click(function(e){
        	i++;
            $("#dynamic_table_field").append('<tr id=row'+i+'><td><button name="remove" id="'+i
            +'" class="btn btn-danger btn-sm btn-remove">X</button></td><td><input type="file" onchange="myfn(this)" name="userfile'+i+'" id="event_images'+i
            +'" data-panelid="event_images'+i+'" class="form-control images_list" accept="image/gif, image/png, image/jpeg, image/pjpeg" />'
            +'</td><td id="img_preview_td"><img class="prv" id="img_preview'+i+'" /><input type="hidden" name="pnd" value="1"></td></tr>');
            e.preventDefault();
        });

        $(document).on("click",".btn-remove",function(e){
        	 e.preventDefault();
             var button_id = $(this).attr("id");
             $("#row"+button_id+"").remove();
        });

    });

      function myfn(myinput) {
            var name = $(myinput).attr("name");
            var id = $(myinput).attr("id");
            var val = $(myinput).val();
            debugger;
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png': case 'jpeg':
                    readURL(myinput);
                    break;
                default:
                    $(this).val('');
                    break;
            }
        }


        function readURL(myinput) {
           debugger;
            if (myinput.files && myinput.files[0]) {
                  var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_preview' + $(myinput).attr("id").replace('event_images','') ).attr('src', e.target.result);
                }
                reader.readAsDataURL(myinput.files[0]);
            }
        }

</script>

<script type="text/javascript">
var base_url= '<?php echo base_url()?>';
tinymce.init({
  selector: '.edit',
  height: 270,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help'
  ],
  toolbar: 'undo redo |  formatselect | bold italic image link | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | help',
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