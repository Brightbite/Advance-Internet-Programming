<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-lg-3">
      <h1 class="my-4">My Cart</h1>
    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div class="card mt-4">
        <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
        <div class="card-body">
          <h3 class="card-title">My Cart</h3>
          <div class="col-md-12 UserList" id="UserCart">Load...</div>
          <table class="table">
          <tr>
            <th>No.</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Address</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Privilege</th>
            <th></th>
            <th></th>
          </tr>
          <!--Pull the updateData-->
          <?php if ($cartUser == 'empty') {
                   echo '<tr><td colspan="7">Empty Data.</td></tr>';
                }else{
                 $No = 1;

                 foreach ($cartUser as $cartuser) {
                   $OrderID = $cartuser->OrderID;
                   $CustomerID = $cartuser->CustomerID;
                   $OrderNumber = $cartuser->OrderNumber;

          ?>
          <!--Show updated data-->
                  <tr>
                    <td><?php echo $No; ?></td>
                    <td><?php echo $cartuser->OrderID; ?></td>
                    <td><?php echo $cartuser->OrderNumber; ?></td>
                  </tr>
        <?php   ++$No; } //end foreach
               } //end else
        ?>
   </table>
        </div>
      </div>
      <!-- /.card -->


      <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

  </div>

</div>
<!-- /.container -->
