
    <section id="costume-plan-overview">

      <div class="container zero">
        <div class="heading text-left">
          <h3 class="h-title"><i class="fa fa-archive"></i> Costume Plan</h3>
        </div>
        <div class="row">

          <div class="col-md-12">
            <div class="row" style="padding-left: 2px; padding-right: 2px;">
       
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-book"></i> Your Plan</h3>
                </div>
                <div class="panel-body">

                  <div class="form-group">
                  	<h4><strong><i class="fa fa-file-photo-o"></i> Destination</strong></h4>
                  	<?php if(isset($_SESSION['hotels'])): ?>
                  	<?php foreach($data_plan['destination'] as $a) { ?>
                    	<ul>
                    		<li><?= $a ?></li>
                    	</ul>
                    <?php } ?>
                    <?php endif; ?>
                  </div>
                  <hr>

                  <div class="form-group">
                  	<h4><strong><i class="fa fa-building"></i> Hotel</strong></h4>
                  	<?php if(isset($_SESSION['hotels'])): ?>
                  	<?php foreach($data_plan['hotels'] as $a) { ?>
                    	<ul>
                    		<li><?= $a ?></li>
                    	</ul>
                    <?php } ?>
                	<?php endif; ?>
                  </div>
                  <hr>

                  <div class="form-group">
                  	<h4><strong><i class="fa fa-car"></i> Cars</strong></h4>
                  	<?php if(isset($_SESSION['hotels'])): ?>
                  	<?php foreach($data_plan['cars'] as $a) { ?>
                    	<ul>
                    		<li><?= $a ?></li>
                    	</ul>
                    <?php } ?>
                    <?php endif; ?>
                  </div>

                </div>
                <div class="panel-footer text-right">
                  <a href="<?= base_url('costume_plan') ?>" class="btn btn-default btn-sm" id="reset_des">Back</a>
                  <a class="btn btn-primary btn-sm" id="add_des">Checkout</a>
                </div>
              </div>

            </div> <!-- row -->
          </div> <!-- col-md-8 -->

        </div>
      </div>

    </section>
