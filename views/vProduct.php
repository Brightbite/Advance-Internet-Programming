  <!-- <body> -->

    <!-- Page Content -->
    <div class="container" id="prod_page">
      <!--Pull the updateData-->
      <?php if ($ProductDetail == 'empty') {
               echo 'Empty Data.';
            }else{
             // $No = 1;
             foreach ($ProductDetail as $PD) {
               $ProductID    = $PD->ProductID;
               $ProductName  = $PD->ProductName;
               $ProductDesc  = $PD->ProductDesc;
               $CategoryID   = $PD->CategoryID;
               $Picture      = $PD->Picture;
               $Price        = $PD->Price;

            }
          }

      ?>
      <!--Show updated data-->


      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4">Product <?php echo $PD->ProductID;?></h1>
          <div class="list-group">
            <a href="#" class="list-group-item active">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="" alt="">

            <div class="card-body">
              <h3 class="card-title"><?php echo $PD->ProductName;?></h3>
              <h4>$ <?php echo $PD->Price;?></h4>
              <p class="card-text"><?php echo $PD->ProductDesc;?></p>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
          </div>
          <!-- /.card -->

          <!-- <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Product Relate
            </div>
            <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <a href="#" class="btn btn-success">Leave a Review</a>
            </div>
          </div> -->
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->
