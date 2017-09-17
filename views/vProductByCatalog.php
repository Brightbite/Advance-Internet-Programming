<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4 text-info"><?php echo $top;?></h1>

      <!-- Catalog -->
      <div class="list-group">
            <?php if(is_array($Catalog) == true){ ?>
            <?php foreach ($Catalog as  $catalog) {   $catalog->CategoryID; ?>
              <a href="<?php echo base_url();?>/product_by_catalog/<?php echo $catalog->CategoryID;?>/<?php echo $catalog->CategoryName;?>" class="bg-dark text-light list-group-item "><?php echo $catalog->CategoryName;?></a>
            <?php } //end foreach ?>
          <?php }else{ ?>
             <a href="" class="bg-dark text-light list-group-item">All Catalog</a>
          <?php } ?>
      </div>
      <!-- Catalog -->
    </div>

    <!-- /.col-lg-3 -->

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

              <p class="text-secondary"><?php echo mb_substr($productDesc,0,150,'utf-8');?>...</p>
            <!-- card body -->
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
