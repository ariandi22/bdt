<!DOCTYPE html>
<html lang="id">
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

    <!-- js -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <!-- bs js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- bs select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>

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
          <li><a href="<?= base_url('tour_package') ?>"><i class="fa fa-briefcase" style="color: #5587a2"></i> Paket Wisata</a></li>
          <li><a href="<?= base_url('costume_plan') ?>"><i class="fa fa-file-text" style="color: #926AA6"></i> Costume Plan</a></li>
          <li><a href=""><i class="fa fa-globe" style="color: #97d5e0"></i> Objek Wisata</a></li>
          </ul>
        </div>
      </div>

    </nav>

    <!-- CONTENT GOES HERE -->
    <?php $this->load->view($content); ?>


    <footer>
      <div class="container">
          <div class="col-md-10 col-md-offset-1 text-center">
              
              <h6>Design with <i class="fa fa-heart red" style="color: #BC0213;"></i> by <a href="" target="_blank">Bigkiandi Team</a></h6>
          </div>   
      </div>
    </footer>

    <script type="text/javascript">
      $(function(){
        $('.selectpicker').selectpicker();
    });
    </script>

</body>
</html>