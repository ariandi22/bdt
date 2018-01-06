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
          <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- <a class="navbar-left" href="#"><img src="<?= base_url()?>assets/img/logo.jpg" width="130"></a> -->
          <?php if(isset($this->logo)) { ?>
              <a class="navbar-left" href="index.html">
                <img src="<?= base_url().$this->logo['img']?>" width="130">
              </a>
          <?php } else { ?>
              <a class="navbar-brand" href="index.html">
                <?= "GoldenTrans"; ?>
              </a>
          <?php } ?>
        </div>
        	<!-- <div class="lang">
          	<select class="selectpicker" data-style="btn-xs" data-width="fit">
				<option data-content=''></option>
				<option  data-content=''></option>
		  	</select>
		</div> --> 
        <div class="collapse navbar-collapse" id="menu-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
          </ul>
        </div>

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

    <section id="regular">

      <div class="container zero">
        <div class="heading text-left">
          <h3 class="h-title"><i class="fa fa-archive"></i> Costume Plan</h3>
        </div>
        <div class="row">

          <div class="col-md-8">
            <div class="row">

              <div class="heading2 col-lg-12 col-md-12 col-sm-12 col-xs-12"">
                <h5><i class="fa fa-file-image-o"></i> Destination Available</h5>
              </div>
              <?php foreach($reg as $a) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 r-pad">
                    <div class="thumbnail bg-light">
                    <div class="gal-item2">
                    <div class="box2">
                      <img class="img-responsive" src="<?= base_url().$a['path']?>">
                    </div>
                    </div>
                      <div class="c-body">
                        <div class="title"><strong><?= $a['name'] ?></strong>
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i></p>
                        </div>

                        <div class="blog-date2"><i class="fa fa-camera-retro fa-2x"></i></div>
                        <div class="text-right">
                          <button href="#" class="btn btn-primary btn-sm reg" value="<?= $a['name'] ?>">add</button>
                        </div>
                      </div>
                    </div>
                </div>
              <?php } ?>

              <div class="heading2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h5><i class="fa fa-building"></i> Hotels</h5>
              </div>
              <?php foreach($hotels as $a) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 r-pad">
                    <div class="thumbnail bg-light">
                    <div class="gal-item2">
                    <div class="box2">
                      <img class="img-responsive" src="<?= base_url().$a['path']?>">
                    </div>
                    </div>
                      <div class="c-body">
                        <div class="title"><strong><?= $a['name'] ?></strong>
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i></p>
                        </div>

                        <div class="blog-date2"><i class="fa fa-camera-retro fa-2x"></i></div>
                        <div class="text-right">
                          <button href="#" class="btn btn-primary btn-sm hot" value="<?= $a['name'] ?>">add</button>

                          <label class="switch">
                            <input type="checkbox" name="chk" class="chk1" value="<?= $a['name'] ?>">
                            <span class="slider round"></span>
                          </label>

                        </div>
                      </div>
                    </div>
                </div>
              <?php } ?>

              <div class="heading2 col-lg-12 col-md-12 col-sm-12 col-xs-12"">
                  <h5><i class="fa fa-car"></i> Cars</h5>
              </div>
              <?php foreach($cars as $a) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 r-pad">
                    <div class="thumbnail bg-light">
                    <div class="gal-item2">
                    <div class="box2">
                      <img class="img-responsive" src="<?= base_url().$a['path']?>">
                    </div>
                    </div>
                      <div class="c-body">
                        <div class="title"><strong><?= $a['name'] ?></strong>
                        <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"><i class="fa fa-star"></i><i class="fa fa-star"></i></i></p>
                        </div>

                        <div class="blog-date2"><i class="fa fa-camera-retro fa-2x"></i></div>
                        <div class="text-right">
                          <button href="#" class="btn btn-primary btn-sm car" value="<?= $a['name'] ?>">add</button>
                        </div>
                      </div>
                    </div>
                </div>
              <?php } ?>

          </div>
          </div>

          <div class="col-md-4">

            <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Plan Overview</h3></div>
              <div class="panel-body">

                <div class="row">

                  <div class="destination">
                    <div class="col-md-12"><h5 class="title-c">Destination</h5></div>
                    <br>
                    <div id="destination">
                      <small class="col-md-12" id="des-no-data">no destination are selected</small>
                    </div>
                  </div>
                  <br><br><hr>

                  <div class="hotels">
                    <div class="col-md-12"><h5 class="title-c">Hotel</h5></div>
                    <br>
                    <div id="hotels">
                      <small class="col-md-12" id="hot-no-data">no hotels are selected</small>
                    </div>
                  </div>
                  <br><br><hr>

                  <div class="cars">
                    <div class="col-md-12"><h5 class="title-c">Cars</h5></div>
                    <br>
                    <div id="cars">
                      <small class="col-md-12" id="car-no-data">no cars are selected</small>
                    </div>
                  </div>

                </div>

              </div>
              <div class="panel-footer text-right">
                <a href="" class="btn btn-primary btn-sm">Next</a>
              </div>
            </div>
          </div>

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

    <script type="text/javascript">

      $(document).on('click','.reg', function(){
        var get = $(this).val();
        var data = '<div class="col-md-12"><div class="bg k"><i class="fa fa-file-image-o"></i> '+get+' <button class="remove pull-right">x</button></div></div>';
        $(data).appendTo('#destination');
        $('#des-no-data').hide();
      });

      // remove append
      $("#destination").on("click", ".remove", function() {
        $(this).parent().remove();
        var numItems = $('.bg').length;
        if (numItems <= 0) {
          $('#des-no-data').show();
        }
      });

      // hotels
      $(document).on('click','.hot', function(){
        var get = $(this).val();
        var data = '<div class="col-md-12"><div class="bg1 k"><i class="fa fa-file-image-o"></i> '+get+' <button class="remove1 pull-right">x</button></div></div>';
        $(data).appendTo('#hotels');
        $('#hot-no-data').hide();
      });

      $("#hotels").on("click", ".remove1", function() {
        $(this).parent().remove();
        var numItems = $('.bg1').length;
        if (numItems <= 0) {
          $('#hot-no-data').show();
        }
      });

      // cars
      $(document).on('click','.car', function(){
        var get = $(this).val();
        var data = '<div class="col-md-12"><div class="bg2 k"><i class="fa fa-file-image-o"></i> '+get+' <button class="remove2 pull-right">x</button></div></div>';
        $(data).appendTo('#cars');
        $('#car-no-data').hide();
      });

      $("#cars").on("click", ".remove2", function() {
        $(this).parent().remove();
        var numItems = $('.bg2').length;
        if (numItems <= 0) {
          $('#car-no-data').show();
        }
      });

      // check if access use mobile device
      $( document ).ready(function() {      
        var isMobile = window.matchMedia("only screen and (max-width: 760px)");

        if (isMobile.matches) {
            alert('Klik add untuk menambahkan, Data order anda tersedia di Plan Overview pada bagian bawah halaman.');
        }
     });

      $(document).ready(function() {
          var i = 1;
          $('.chk1').on('change', function() {
              i++;
              var get = $(this).val();
              if($(this).is(":checked")) {
                var data = '<div class="col-md-12"><div class="bg2 k"><i class="fa fa-file-image-o"></i> '+get+' <button class="remove'+i+' pull-right">x</button></div></div>';
                $(data).appendTo('#cars');
                $('#car-no-data').hide();
              }
          });
      });
  
    </script>

</body>
</html>