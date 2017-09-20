    <!-- Page Content -->
    <div class="container">
      <!--Pull the updateData-->
      <div class="row">
          <div class="col-md-3">
              <h1 class="my-4 text-info">Product</h1>
              <div class="list-group">
                      <?php if(is_array($Catalog) == true){ ?>
                      <?php foreach ($Catalog as  $catalog) {   $catalog->CategoryID; ?>
                        <a href="<?php echo base_url();?>/product_by_catalog/<?php echo $catalog->CategoryID;?>/<?php echo $catalog->CategoryName;?>" class="bg-dark text-light list-group-item "><?php echo $catalog->CategoryName;?></a>
                      <?php } //end foreach ?>
                    <?php }else{ ?>
                       <a href="" class="bg-dark text-light list-group-item">All Catalog</a>
                    <?php } ?>
              </div>
            <!-- /.col-lg-3 -->
          </div>
          <!-- <div class="col-md-9"> -->
            <div class="col-md-4"><br>
                <img class="img img-responsive" src="<?php echo $ProductDetail->Picture;?>" alt="" style="width:100%">
            </div>
            <div class="col-md-4">
              <!-- <div class="card-body"> -->
                  <br><br> <br><br>
                    <h3 class="card-title"><?php echo $ProductDetail->ProductName;?> </h3><hr>
                    <h6 class="text-muted text-white">Product ID# <?php echo $ProductDetail->ProductID;?></h6><br>
                    <h4>AUD <i class="fa fa-usd" aria-hidden="true"></i> <?php echo $ProductDetail->Price;?>.00</h4><br>
                    <h5>Quantity:</h5>
                    <!-- <div class="col-lg-3"> -->
                  <form class="" action="<?php echo base_url()?>/addtocart" method="post">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                      <div class="btn-group mr-1" role="group" aria-label="First group" style="width:50%">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-dark"  id="bnt1"> - </button>
                        </span>
                        <input type="text" class="form-control" name="qty" id="qty" value="1">
                        <input type="text" name="prodID" value="<?php echo $ProductDetail->ProductID;?>" style="display:none">
                        <input type="text" name="prodName" value="<?php echo $ProductDetail->ProductName;?>" style="display:none">
                        <input type="text" name="prodPrice" value="<?php echo $ProductDetail->Price;?>" style="display:none">
                        <input type="text" name="prodPic" value="<?php echo $ProductDetail->Picture;?>" style="display:none">
                        <input type="text" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" style="display:none">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-dark" id="bnt2"> + </button>
                        </span>
                      </div>
                      <div class="btn-group" role="group" aria-label="Second group">
                          <button  type="submit"  class="btn btn-dark pull-right"><i class="fa fa-cart-plus" aria-hidden="true"> Add to Cart</i></button>
                      </div>
                    </div><!-- /input-group -->
                    </form>
                    <div class="panel panel-info">
                      <hr>
                      <div class="panel-heading text-info">Description</div>
                      <div class="panel-body">
                        <p class="card-text text-secondary"><?php echo $ProductDetail->ProductDesc;?></p>
                      </div>
                    </div> <!-- description -->
                    <br><br>
                    <br><br>
            <!-- close md5 -->
            </div>
      <!-- close row -->
      </div>
<!-- Container -->
</div>


<script type="text/javascript">
    $(document).ready(function(){

        $('#bnt1').click(function(){
             var qty = parseInt($('#qty').val());
             if (qty > 0) {
                 var cqty  = qty - 1;
                 $('#qty').val(cqty);
             }
        });
        $('#bnt2').click(function(){
            //alert('bnt2');
             var qty = parseInt($('#qty').val());

                 var cqty  = qty + 1;
                 $('#qty').val(cqty);

        });
    });
</script>
