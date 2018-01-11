<section id="tour-package">

    <div class="heading text-center container">
        <h3 class="h-title r-pad">Paket Wisata</h3>
    </div>

      <div class="text-center hidden-lg hidden-md" style="padding: 2px 3px;">
        <div class="label label-info"><- geser -></div>
      </div>

    <div class="container">

      <div class="row">
      	<div class="col-md-9">
      	  <div class="row">
	        <?php foreach($regular as $a) { ?>
	          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 r-pad">
	              <div class="thumbnail bg-light">
	              <div class="gal-item">
	              <div class="box">
	                <img class="img-responsive" src="<?= base_url().$a['path']?>">
	              </div>
	              </div>
	                <div class="c-body">
	                  <div class="title"><strong><a href="<?= base_url('tour_package/').$a['slug'] ?>"><?= $a['name'] ?></a></strong>
	                  <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i></p>
	                  </div>
	                  
	                  <div class="blog-date"><i class="fa fa-camera-retro fa-2x"></i></div>
	                  <div class="btn-v">
	                  	<div class="price">mulai dari </div>
	                    <strong>IDR <?= $a['quantity'] ?></strong>
	                  </div>
	                </div>
	              </div>
	          </div>
	        <?php } ?>
    	  </div>
    	</div>

    	<div class="col-md-3">
    		<div class="panel panel-default">
    			<div class="panel-heading"><h3 class="panel-title">Urutkan</h3></div>
    			<div class="panel-body">
    				the title
    			</div>
    		</div>
    	</div>

    </div>

    </div>

</section>