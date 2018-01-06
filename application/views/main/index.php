<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="<?= base_url().$this->icon['img']?>" sizes="48x48">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/style.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
  </head>
  <body>

    <!-- <div class="container-fluid top">
      <div class="container">
        <a href="#"><strong><i class="fa fa-phone-square"></i> Hotline : 082137550910</strong> </a>
      </div>
    </div> -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <!-- <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> -->

          <!-- <a class="navbar-left" href="#"><img src="<?= base_url()?>assets/img/logo.jpg" width="130"></a> -->
          <?php if(isset($this->logo)) { ?>
              <a class="navbar-left" href="<?= base_url() ?>">
                <img src="<?= base_url().$this->logo['img']?>" width="130">
              </a>
          <?php } else { ?>
              <a class="navbar-brand" href="<?= base_url() ?>">
                <?= "GoldenTrans"; ?>
              </a>
          <?php } ?>
        </div>

        <div class="bnr">
            <img src="<?= base_url('assets/img/logo.png')?>" width="130">
        </div>

        	<!-- <div class="lang">
          	<select class="selectpicker" data-style="btn-xs" data-width="fit">
				<option data-content=''></option>
				<option  data-content=''></option>
		  	</select>
		</div> --> 
       <!--  <div class="collapse navbar-collapse" id="menu-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= base_url() ?>">Home</a></li>
          </ul>
        </div> -->

      </div>

      <div class="hotline">
        <div class="container">
          <a class="pull-right" href=""><i class="fa fa-phone-square" style="color: #5bc0de"></i> hotline call 021-9928-11</a>

        <div class="dropdown lang">
      		 <button class="btn btn-y btn-xs dropdown-toggle" type="button" data-toggle="dropdown"><span class="flag-icon flag-icon-id"></span> ID
      		 <span class="caret"></span></button>
      			<ul class="dropdown-menu dropdown-menu-left">
      			    <li><a href="#"><span class="flag-icon flag-icon-id"></span> ID</a></li>
      			    <li><a href="#"><span class="flag-icon flag-icon-gb"></span> ENG</a></li>
      			</ul>
		    </div>

        </div>
      </div>

    </nav>


<div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner" role="listbox">

            <div class="item active" style="background-color: #5bc0de">
              <div class="container">
                <div class="row tengah size">
                  <div class="col-md-4 col-xs-6">
                    <img class="img-responsive" src="<?= base_url('assets/img/h1-fix.png')?>">
                  </div>
                  <div class="col-md-8 col-xs-6 padding">
                    <h3 class="c-title">We are Tour and Travel Agency Based In yogyakarta</h3>
                    <a href="#" class="btn btn-default btn-sm x">Learn More</a>
                  </div>
                </div>
              </div>
            </div> 

            <div class="item" style="background-color: #5bc0de">
              <div class="container">
                <div class="row tengah size">
                  <div class="col-md-4 col-xs-6">
                    <img class="img-responsive" src="<?= base_url('assets/img/h2-fix.png')?>">
                  </div>
                  <div class="col-md-8 col-xs-6 padding">
                    <h3 class="c-title">We do the work, you have a tour you'll never forget</h3>
                    <a href="#" class="btn btn-default btn-sm x">Learn More</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="item" style="background-color: #5bc0de">
              <div class="container">
                <div class="row tengah size">
                  <div class="col-md-4 col-xs-6">
                    <img class="img-responsive" src="<?= base_url('assets/img/h3-fix.png')?>">
                  </div>
                  <div class="col-md-8 col-xs-6 padding">
                    <h3 class="c-title">See our package and other</h3>
                    <a href="#" class="btn btn-default btn-sm x">See now</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="item" style="background-color: #5bc0de">
              <div class="container">
                <div class="row tengah size">
                  <div class="col-md-4 col-xs-6">
                    <img class="img-responsive" src="<?= base_url('assets/img/h4-fix.png')?>">
                  </div>
                  <div class="col-md-8 col-xs-6 padding">
                    <h3 class="c-title">Want randome trip? Let's create Your own plan</h3>
                    <a href="<?= base_url('costume_plan') ?>" class="btn btn-default btn-sm x">Let's Do it</a>
                  </div>
                </div>
              </div>
            </div>
    
        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
        </a>
    </div>
</div>

      <div class="top-bottom-menu menu-atas">
        <div class="container">
          <ul class="nav">
            <li><a href="<?= base_url() ?>"><i class="fa fa-home" style="color: #97d5e0"></i> Beranda</a></li>
          <li><a href=""><i class="fa fa-briefcase" style="color: #5587a2"></i> Paket Wisata</a></li>
          <li><a href="<?= base_url('costume_plan') ?>"><i class="fa fa-file-text" style="color: #926AA6"></i> Costume Plan</a></li>
          <li><a href=""><i class="fa fa-globe" style="color: #97d5e0"></i> Objek Wisata</a></li>
          </ul>
        </div>
      </div>

<section id="regular">
      <div class="heading text-left container">
          <h3 class="h-title"><i class="fa fa-archive"></i> Paket Reguler</h3>
      </div>

      <div class="text-center hidden-lg hidden-md" style="padding: 2px 3px;">
        <div class="label label-info"><- swipe to view more -></div>
      </div>

    <div class="container kartu">

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
                  <div class="title"><strong><?= $a['name'] ?></strong>
                  <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i></p>
                  </div>

                  <p>
                    start from IDR <?= $a['quantity'] ?>
                  </p>
                  
                  <div class="blog-date"><i class="fa fa-camera-retro fa-2x"></i></div>
                  <a href="#" class="btn btn-primary btn-xs orange">view detail</a>
                </div>
              </div>
          </div>
        <?php } ?>
    </div>

    </div>

</section>

<section id="premium">
      <div class="heading text-left container">
          <h3 class="h-title"><i class="fa fa-archive"></i> Paket Premium</h3>
      </div>

      <div class="text-center hidden-lg hidden-md" style="padding: 2px 3px;">
        <div class="label label-info"><- geser -></div>
      </div>

    <div class="container kartu">

      <div class="row">
        <?php foreach($premium as $a) { ?>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 r-pad">
              <div class="thumbnail bg-light">
              <div class="gal-item">
              <div class="box">
                <img class="img-responsive" src="<?= base_url().$a['path']?>">
              </div>
              </div>
                <div class="c-body">
                  <div class="title"><strong><?= $a['name'] ?></strong></div>

                  <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i></p>

                  <p>
                    start from IDR <?= $a['quantity'] ?>
                  </p>
                  
                  <div class="blog-date"><i class="fa fa-camera-retro fa-2x"></i></div>
                  <a href="#" class="btn btn-primary btn-xs orange">view detail</a>
                </div>
              </div>
          </div>
        <?php } ?>
    </div>

    </div>
    
</section>

<footer>
    <div class="container">
        <div class="col-md-10 col-md-offset-1 text-center">
            
            <h6>Design with <i class="fa fa-heart red" style="color: #BC0213;"></i> by <a href="" target="_blank">Bigkiandi Team</a></h6>
        </div>   
    </div>
</footer>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
    	$(function(){
		    $('.selectpicker').selectpicker();
		});
    </script>

  </body>
</html>