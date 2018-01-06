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

    </nav>


    <section id="regular">

      <div class="container zero">
        <div class="heading text-left">
          <h3 class="h-title"><i class="fa fa-archive"></i> Costume Plan</h3>
        </div>
        <div class="row">

          <div class="col-md-8">
            <div class="row" style="padding-left: 2px; padding-right: 2px;">

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-file-image-o"></i> Destination Available</h3>
                </div>
                <div class="panel-body p-pad">
                  
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
                            <label class="switch">
                              <input type="checkbox" name="chk" class="dst" value="<?= $a['name'] ?>">
                              <span class="slider round"></span>
                            </label>
                          </div>
                        </div>
                      </div>
                  </div>
                <?php } ?>

                </div>
                <div class="panel-footer text-right">
                  <button class="btn btn-default btn-sm" id="reset_des">reset</button>
                  <button class="btn btn-primary btn-sm" id="add_des">Add</button>
                </div>
              </div>


              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-building"></i> Hotels</h3>
                </div>
                <div class="panel-body p-pad">
                  
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

                              <label class="switch">
                                <input type="checkbox" name="chk" class="htl" value="<?= $a['name'] ?>">
                                <span class="slider round"></span>
                              </label>

                            </div>
                          </div>
                        </div>
                    </div>
                  <?php } ?>

                </div>
                <div class="panel-footer text-right">
                  <button class="btn btn-default btn-sm" id="reset_hotels">reset</button>
                  <button class="btn btn-primary btn-sm" id="add_hotels">Add</button>
                </div>
              </div>


              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-car"></i> Cars</h3>
                </div>
                <div class="panel-body p-pad">
                  
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
                              <label class="switch">
                                <input type="checkbox" name="chk" class="crs" value="<?= $a['name'] ?>">
                                <span class="slider round"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                  <?php } ?>

                </div>
                <div class="panel-footer text-right">
                  <button class="btn btn-default btn-sm" id="reset_cars">reset</button>
                  <button class="btn btn-primary btn-sm" id="add_cars">Add</button>
                </div>
              </div>

            </div> <!-- row -->
          </div> <!-- col-md-8 -->

          <div class="col-md-4">

            <form method="post" action="<?= base_url('costume_plan_preview') ?>">
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
                      <small class="col-md-12" id="htl-no-data">no hotels are selected</small>
                    </div>
                  </div>
                  <br><br><hr>

                  <div class="cars">
                    <div class="col-md-12"><h5 class="title-c">Cars</h5></div>
                    <br>
                    <div id="cars">
                      <small class="col-md-12" id="crs-no-data">no cars are selected</small>
                    </div>
                  </div>

                </div>

              </div>

              <div class="panel-footer text-right">
                <button type="submit" class="btn btn-primary btn-sm">Next</button>
              </div>

            </form>
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

      // $(document).on('click','#destination', function(){
      //   var get = $(this).val();
      //   var data = '<div class="col-md-12"><div class="bg k"><i class="fa fa-file-image-o"></i> '+get+' <button class="remove pull-right">x</button></div></div>';
      //   $(data).appendTo('#destination');
      //   $('#des-no-data').hide();
      // });

      $('#add_des').click(function(){
        var cek = $('.dst').is(':checked');
        if(cek == true) {
          $('.dst:checked').each(function(i){
            get = $(this).val();
            var data = '<div class="col-md-12 res-ap-des"><div class="bg k"><i class="fa fa-file-image-o"></i> '+get+' <button class="remove pull-right">x</button><input type="text" name="des[]" value="'+get+'"></div></div>';
            $(data).appendTo('#destination');
            $('#des-no-data').hide();
          });
          $(this).text('done').prop('disabled', true);
        } else {
          alert('There is no data are selected');
        }
      });

      $('#reset_des').on('click', function(){
        $('#add_des').prop('disabled', false).text('Add');
        $('.dst').prop('checked', false);
        $('.res-ap-des').remove();
        $('#des-no-data').show();
      });

      $("#destination").on("click", ".remove", function() {
        $(this).parent().remove();
        var numItems = $('.bg').length;
        if (numItems <= 0) {
          $('#des-no-data').show();
        }
      });

      $('#add_hotels').click(function(){
        var cek = $('.htl').is(':checked');
        if(cek == true) {
          $('.htl:checked').each(function(i){
            get = $(this).val();
            var data = '<div class="col-md-12 res-ap-htl"><div class="bg1 k"><i class="fa fa-file-image-o"></i> '+get+' <button class="remove1 pull-right">x</button><input type="text" name="hotels[]" value="'+get+'"></div></div>';
            $(data).appendTo('#hotels');
            $('#htl-no-data').hide();
          });
          $(this).text('done').prop('disabled', true);
        } else {
          alert('There is no data are selected');
        }
      });

      $('#reset_hotels').on('click', function(){
        $('#add_hotels').prop('disabled', false).text('Add');
        $('.htl').prop('checked', false);
        $('.res-ap-htl').remove();
        $('#htl-no-data').show();
      });

      $("#hotels").on("click", ".remove1", function() {
        $(this).parent().remove();
        var numItems = $('.bg1').length;
        if (numItems <= 0) {
          $('#htl-no-data').show();
        }
      });

      $('#add_cars').click(function(){
        var cek = $('.crs').is(':checked');
        if(cek == true) {
          $('.crs:checked').each(function(i){
            get = $(this).val();
            var data = '<div class="col-md-12 res-ap-crs"><div class="bg2 k"><i class="fa fa-file-image-o"></i> '+get+' <button class="remove2 pull-right">x</button><input type="text" name="cars[]" value="'+get+'"></div></div>';
            $(data).appendTo('#cars');
            $('#crs-no-data').hide();
          });
        $(this).text('done').prop('disabled', true);
        } else {
          alert('There is no data are selected');
        }
      });

      $('#reset_cars').on('click', function(){
        $('#add_cars').prop('disabled', false).text('Add');
        $('.crs').prop('checked', false);
        $('.res-ap-crs').remove();
        $('#crs-no-data').show();
      });

      $("#cars").on("click", ".remove2", function() {
        $(this).parent().remove();
        var numItems = $('.bg2').length;
        if (numItems <= 0) {
          $('#crs-no-data').show();
        }
      });

      // check if access use mobile device
      $( document ).ready(function() {      
        var isMobile = window.matchMedia("only screen and (max-width: 760px)");

        if (isMobile.matches) {
            alert('Klik add untuk menambahkan, Data order anda tersedia di Plan Overview pada bagian bawah halaman.');
        }
     });
  
    </script>

</body>
</html>