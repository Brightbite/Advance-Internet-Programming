    <!-- Page Content -->
    <br><br><br><br>
    <div class="carousel slide img img-responsive" data-ride="carousel">

            <div class="carousel-item active">
              <div class="carousel-caption d-none d-md-block">
                <a href="<?php echo base_url()?>catalog_detail/<?=$productRecImage->ProductID?>"><input type="hidden" name="" value="<?php echo $productRecImage->ProductID;?>">
                <img class="pull-left" src="<?=$productRecImage->Picture;?>" alt="">
                </a>

                <?php if(is_array($Catalog) == true){ ?>
                  <?php foreach ($Catalog as  $catalog) {   $catalog->CategoryID; ?>
                  <a href="<?php echo base_url();?>product_by_catalog/<?php echo $catalog->CategoryID;?>/<?php echo $catalog->CategoryName;?>"
                    class="btn btn-lg bg-dark text-light"><?php echo $catalog->CategoryName;?>
                  </a>
                  <?php } //end foreach ?>
                <?php }else{ ?>
                 <a href="" class="bg-dark text-light list-group-item">All Catalog</a>
                <?php } ?>
                <hr>
                <br><br><br><br><br>
                <h3 class="text-dark pull-left"><?=mb_substr($productRecImage->ProductName,0,50,'utf-8');?></h3><br><br>
                <p class="text-dark pull-left"><?=mb_substr($productRecImage->ProductDesc,0,100,'utf-8');?>...</p><br>
                <p><br>
                  <a class="pull-left btn btn-lg btn-outline-secondary  btn-sm " href="<?php echo base_url()?>catalog_detail/<?=$productRecImage->ProductID?>" role="button">More details
                    <input type="hidden" name="" value="<?php echo $productRecImage->ProductID;?>">
                  </a>
                </p>
              </div>
            </div>
    </div>



    <div class="container">
      <div class="row">
        <!-- /.col-lg-3 -->
        <div class="col-lg-3">
          <!-- <h1 class="my-4 text-info"><?php echo $top;?></h1> -->
          <!-- Catalog -->
          <!-- <div class="list-group">
                <?php if(is_array($Catalog) == true){ ?>
                <?php foreach ($Catalog as  $catalog) {   $catalog->CategoryID; ?>
                  <a href="<?php echo base_url();?>product_by_catalog/<?php echo $catalog->CategoryID;?>/<?php echo $catalog->CategoryName;?>" class="bg-dark text-light list-group-item"><?php echo $catalog->CategoryName;?></a>
                <?php } //end foreach ?>
              <?php }else{ ?>
                 <a href="" class="bg-dark text-light list-group-item">All Catalog</a>
              <?php } ?>
          </div> -->
          <!-- Catalog -->
        </div>
        <div class="col-lg-12">

          <div align="center"><br><hr><h5>Recommendation</h5><hr><br></div>
          <div class="row">

            <?php if (is_array($productRecommend)){?>

              <?php foreach($productRecommend as $prodRec){?>


            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100" style="max-width: 20rem;">
                <a href="<?php echo base_url()?>catalog_detail/<?=$prodRec->ProductID?>"><input type="hidden" name="" value="<?php echo $prodRec->ProductID;?>">
                  <img class="card-img-top" src="<?=$prodRec->Picture?>" alt="">
                </a>
                <div class="card-header bg-scondary">
                  <h6 class="card-title">
                    <a class="text-dark" href="<?php echo base_url()?>catalog_detail/<?=$prodRec->ProductID?>"><?=mb_substr($prodRec->ProductName,0,40,'utf-8');?><input type="hidden" name="" value="<?php echo $prodRec->ProductID;?>"></a>
                  </h6>
                </div>
                <div class="card-body text-info">
                  <h5>AUD $ <?=$prodRec->Price;?>.00</h5>
                  <p class="text-secondary"><?=mb_substr($prodRec->ProductDesc,0,150,'utf-8');?>...</p><br>
                  <small>
                    <a class="text-muted pull-right" href="<?php echo base_url()?>catalog_detail/<?=$prodRec->ProductID?>">more details...<input type="hidden" name="" value="<?php echo $prodRec->ProductID;?>"></a>
                  </small>
                </div>
                <div class="card-footer">
                  <form class="" action="<?php echo base_url()?>/addtocart" method="post">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                      <div class="btn-group mr-1" role="group" aria-label="First group" style="width:60%">
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-dark"  id="bnt1"> - </button>
                        </span> -->
                        <input type="text" class="form-control" name="qty" id="qty" value="1" style="display:none">
                        <input type="text" name="prodID" value="<?php echo $prodRec->ProductID;?>" style="display:none">
                        <input type="text" name="prodName" value="<?php echo $prodRec->ProductName;?>" style="display:none">
                        <input type="text" name="prodPrice" value="<?php echo $prodRec->Price;?>" style="display:none">
                        <input type="text" name="prodPic" value="<?php echo $prodRec->Picture;?>" style="display:none">
                        <input type="text" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" style="display:none">
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-dark" id="bnt2"> + </button>
                        </span> -->
                      </div>
                      <div class="btn-group" role="group" aria-label="Second group">
                        <button  type="submit"  class=" btn-sm btn btn-dark pull-right"><i class="fa fa-cart-plus" aria-hidden="true"> Add to Cart</i></button>
                      </div>
                    </div><!-- /input-group -->
                    </form>
                  <small class="text-muted"></small>
                </div>
              </div>
            </div>
          <?php }?>
            <?php } ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
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
