<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-lg-3">
      <h1 class="my-4">My Cart</h1>
    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div class="card mt-4">
        <!-- <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt=""> -->
        <div class="card-body">
          <h3 class="card-title">My Cart</h3>
          <div class="col-md-12 UserList" id="UserCart">Load...</div>
          <table class="table">
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

                  <th>No.</th>
                  <th>QTY</th>
                  <th>Item Description</th>
                  <th style="text-align:right">Item Price</th>
                  <th style="text-align:right">Sub-Total</th>

                  <tr>
                    <td><?php echo $No; ?></td>
                    <td><?php echo $cartuser->OrderID; ?></td>
                    <td><?php echo $cartuser->OrderNumber; ?></td>
                  </tr>
          </tr>
        <?php   ++$No; } //end foreach
               } //end else
        ?>
   </table>
   <?php echo form_open('path/to/controller/update/method'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">



<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>

<p><?php echo form_submit('', 'Update your Cart'); ?></p>
<p><?php echo form_submit('', 'Checkout'); ?></p>
        </div>
      </div>
      <!-- /.card -->


      <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

  </div>

</div>
<!-- /.container -->
