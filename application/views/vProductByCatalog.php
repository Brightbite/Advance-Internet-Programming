<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <h1 class="my-4 text-info"><?php echo $top;?></h1>
      <!-- Catalog -->
      <div class="list-group">
            <?php if(is_array($Catalog) == true){ ?>
            <?php foreach ($Catalog as  $catalog) {   $catalog->CategoryID; ?>
              <a href="<?php echo base_url();?>/product_by_catalog/<?php echo $catalog->CategoryID;?>/<?php echo $catalog->CategoryName;?>"
                class="bg-dark text-light list-group-item list-group-item-action"><?php echo $catalog->CategoryName;?>
              </a>
            <?php } //end foreach ?>
          <?php }else{ ?>
             <a href="" class="bg-dark text-light list-group-item">All Catalog</a>
          <?php } ?>
      </div>
    </div>

    <div class="col-lg-9">
      <div align="center"><br><hr><h5><?php echo $TitleGroup; ?></h5><hr><br></div>
      <div class="row">
          <?php if (is_array($products)==true){?>
          <?php foreach ($products as $product){
               $productID = $product->ProductID;
               $productName = $product->ProductName;
               $productDesc = $product->ProductDesc;
               $productPrice = $product->Price;
               $productPicture = $product->Picture;
       ?>
        <div class="col-lg-4" >
          <div class="card mb-3" style="max-width: 20rem;">
            <a href="<?php echo base_url()?>catalog_detail/<?=$productID?>" ><input type="hidden" name="" value="<?php echo $productID;?>">
              <img class="card-img-top" src="<?php echo $productPicture;?>" alt="image" title="images" style="width:100%">
            </a>
            <div class="card-header bg-scondary">
              <h6>
              <a class="text-dark" href="<?php echo base_url()?>catalog_detail/<?=$productID?>" ><?php echo mb_substr($productName,0,40,'utf-8');?>... <input type="hidden" name="" value="<?php echo $productID;?>"></a>
              </h6>
              <!-- card header -->
            </div>
            <div class="card-body text-info">
              <h5>AUD <i class="fa fa-usd" aria-hidden="true"></i> <?php echo $productPrice ?>.00</h5>

              <p class="text-secondary"><?php echo mb_substr($productDesc,0,150,'utf-8');?>...</p><br>
              <small>
                <a class="text-muted pull-right" href="<?php echo base_url()?>catalog_detail/<?=$productID?>">more details...<input type="hidden" name="" value="<?php echo $productID;?>"></a>
              </small>
            <!-- card body -->
            </div>
            <div class="card-footer">
              <form class="" action="<?php echo base_url()?>/addtocart" method="post">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-1" role="group" aria-label="First group" style="width:50%">
                    <input type="text" class="form-control" name="qty" id="qty" value="1" style="display:none">
                    <input type="text" name="prodID" value="<?php echo $productID;?>" style="display:none">
                    <input type="text" name="prodName" value="<?php echo $productName;?>" style="display:none">
                    <input type="text" name="prodPrice" value="<?php echo $productPrice;?>" style="display:none">
                    <input type="text" name="prodPic" value="<?php echo $productPicture;?>" style="display:none">
                    <input type="text" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" style="display:none">
                  </div>
                  <div class="btn-group" role="group" aria-label="Second group">
                    <button  type="submit"  class=" btn-sm btn btn-dark pull-right"><i class="fa fa-cart-plus" aria-hidden="true"> Add to Cart</i></button>
                  </div>
                </div>
                </form>
              <small class="text-muted"></small>
            </div>
            <!-- content -->
          </div>
        </div>
      <?php } ?>
      <!-- end foreach -->
    <?php } ?>
    <!-- end if -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.col-lg-9 -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
