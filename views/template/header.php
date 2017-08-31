<!DOCTYPE html>
<html lang="en" ng-app="app">
  <header>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="author" content="<?php echo $author; ?>">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>shop-homepage.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>css/shop-item.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/'); ?>custom.css">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/vendor/bootstrap/css/'); ?>bootstrap.css">
    <!-- <link rel="stylesheet" href="</?php echo base_url('application/assets/RP/css/'); ?>bootstrap.css"> -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="home">CindyBite Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">My account
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Sign in</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <body>
    <div id="fb-root"></div>



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Sign in</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body">
            Username<br>
            <input type="text" name="loginName" id="loginName" class="form-control" required placeholder="Username" maxlength="20"><br>
            Password<br>
            <input type="text" name="loginPass" id="loginPass" class="form-control" required placeholder="Password" maxlength="20"><br>
            <button type="button" class="btn btn-primary btn-lg btn-block">Sign In</button><br>
            <h5><p class="text-center">or</p><br></h5>
              <a href="#" class="fb">
              <img  src="<?php echo base_url('application/assets/img/fb_login.png'); ?>" height="75" width="468" >
            </a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-lg btn-block">Create your Bite Shop account</button>
          </div>
        </div>
      </div>
    </div>
