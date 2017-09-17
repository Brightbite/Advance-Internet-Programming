<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="text-dark"><i class="text-info fa fa-address-card-o fa-3x" aria-hidden="true"></i> My account</h1><hr><br>
    </div>
      <div class="col-lg-6 text-secondary">
        <h4 class="text-secondary"><i class="text-primary fa fa-user-circle-o" aria-hidden="true"></i> Account Details<hr></h4>
          Firstname:       <h6 class=" text-info"><?php echo $custname;?></h6>
          Lastname:        <h6 class=" text-info"><?php echo $custlast;?></h6>
          Address Line 1:  <h6 class=" text-info"><?php echo $custAddr1;?></h6>
          Address Line 2:  <h6 class=" text-info"><?php echo $custAddr2;?></h6>
          City:            <h6 class=" text-info"><?php echo $custCity;?></h6>
          State:           <h6 class=" text-info"><?php echo $custState;?></h6>
          Postcode:        <h6 class=" text-info"><?php echo $custPostcode;?></h6>
          Country:         <h6 class=" text-info"><?php echo $custCountry;?></h6>
          Email:           <h6 class=" text-info"><?php echo $custEmail;?></h6>
          Contact Number:  <h6 class=" text-info"><?php echo $custTel;?></h6>
        </div>
        <div class="col-lg-6">
            <h4 class="text-secondary"><i class="text-success fa fa-shopping-bag" aria-hidden="true"></i> Purchase history<hr><br></h4>
        </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- row -->
</div>
<!-- /.container -->
