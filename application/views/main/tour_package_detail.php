  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(document).ready(function () {
        $("#dt").datepicker({
            minDate: 3,
        });
    });
  </script>

<section id="tour-package-detail">

    <div class="heading text-center container">
        <h3 class="h-title r-pad">Package Detail</h3>
    </div>

    <div class="container">

      <div class="row">
      	<div class="col-md-12" style="padding: 5px;">
      	 <div class="panel panel-default">

      	  	<div class="panel-body">

      	  	<div class="row">
	      	<div class="col-md-7">
		        <img src="<?= base_url().$detail[0]['path'] ?>" class="img-responsive">
		    </div>
		    <div class="col-md-5">

		    	<p class="d-title"><?= $detail[0]['name'] ?></p>

		    	<div class="btn-group form-group">
		    		<button class="btn btn-default"><i class="fa fa-calendar"></i>
		    			<p>2 Days</p>
		    		</button>
		    		<button class="btn btn-default"><i class="fa fa-hotel"></i>
		    			<p>Swiss-Belhotel</p>
		    		</button>
		    		<button class="btn btn-default"><i class="fa fa-plane"></i>
		    			<p>Lion Air</p>
		    		</button>
		    	</div>

		    	<div class="form-group">
		    		<label>Pilih Tanggal Keberangkatan</label>
		    		<input type="text" name="dt" id="dt" class="form-control">
		    	</div>

		    	<div class="form-group">
		    		<label>Jumlah /org</label>
		    		<input type="number" name="" class="form-control">
		    	</div>

		    	<div class="form-group">
		    		<label>Harga per/orang</label>
		    		<h4 class="nom">IDR <?= $detail[0]['quantity'] ?></h4>
		    	</div>

		    	<div class="form-group">
		    		<button class="btn btn-primary btn-block">Pesan Sekarang</button>
		    	</div>

		    </div>
			</div>

			</div> <!-- panel body -->
		 </div>
		</div>

		<div class="col-md-12" style="padding: 5px;">

			<div class="tabbable-panel">
				<div id="AppWizard">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
							Itenary </a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
							Gallery </a>
						</li>
						<li id="test">
							<a href="#tab_default_3" data-toggle="tab">
							Review </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<?= $detail[0]['content'] ?>
						</div>
						<div class="tab-pane" id="tab_default_2">
							<?php foreach($detail as $a) { ?>
								<p>
									<img src="<?= base_url().$a['path'] ?>" class="img-responsive">
								</p>
							<?php } ?>
						</div>
						<div class="tab-pane" id="tab_default_3">
							
						</div>
					</div>
				</div>
			</div>
			</div>

		</div>

     </div>
    </div>

</section>
