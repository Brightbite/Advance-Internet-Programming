<!-- <body> -->
    <div class="container">
      <h1 class="my-4  text-info"><?php echo $top;?></h1>
        <div class="row">
          <div class="col-md-12 text-secondary">
            <hr>
            <form method="post" id="formadduser"  enctype="multipart/form-data">
              First name:<br>
              <input type="text" name="sFirstname" id="sFirstname" class="form-control" required autocomplete="false" placeholder="Firstname" maxlength="20"><br>
              Last name:<br>
              <input type="text" name="sLastname" id="sLastname" class="form-control" required placeholder = "Lastname" maxlength="20"><br>
              Address1:<br>
              <input type="text" name="sAddress1" id="sAddress1" class="form-control" required  placeholder="Address Line 1" maxlength="100"><br>
              Address Line 2<br>
              <input type="text" name="sAddress2" id="sAddress2" class="form-control" required  placeholder="Address Line 2" maxlength="100"><br>
              <div class="form-group row">
                <label class="col-md-12 col-form-label">City</label>
                <div class="col-md-12">
                  <input type="text" name="sCity" id="sCity" class="form-control" required  placeholder="City" maxlength="100"><br>
                </div>
                <label class="col-md-6 col-form-label">State</label>
                <label class="col-md-6 col-form-label">Postcode</label>
                <div class="col-md-6">
                  <input type="text" name="sState" id="sState" class="form-control" required placeholder="State" maxlength="10" >
                </div>
                <div class="col-md-6">
                  <input type="text" name="sPostcode" id="sPostcode" class="form-control" required placeholder="Postcode" maxlength="10">
                </div>

                <label class="col-md-12 col-form-label">Country</label>
                <div class="col-md-12">
                  <input type="text" name="sCountry" id="sCountry" class="form-control" required placeholder="Country" maxlength="20">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-6 col-form-label">Username</label>
                <label class="col-md-6 col-form-label">Password</label>
                <div class="col-md-6">
                  <input type="text" name="sUsername" id="sUsername" class="form-control" required placeholder="Username" maxlength="20" aria-describedby="usernameHelpInline">
                  <small id="usernameHelpInline" class="text-muted">
                    Maximum 20 characters long.
                  </small>
                </div>
                <div class="col-md-6">
                  <input type="password" name="sPassword" id="sPassword" class="form-control" required placeholder="Password" maxlength="20" aria-describedby="passwordHelpInline">
                  <small id="passwordHelpInline" class="text-muted">
                    Maximum 20 characters long.
                  </small>
                </div>
              </div>

                <div class="form-group row">
                  <label class="col-md-6 col-form-label">Email</label>
                  <label class="col-md-6 col-form-label">Contact Number</label>
                  <div class="col-md-6">
                  <input type="email" name="sEmail" id="sEmail" class="form-control" required placeholder="Example@email.com" maxlength="50" aria-describedby="emailHelpInline">
                  <small id="emailHelpInline" class="text-muted">
                      Must be available email.
                  </small>
                </div>
                <div class="col-md-6">
                  <input type="text" name="sTel" id="sTel" class="form-control" required placeholder="Contact number" maxlength="20" aria-describedby="telHelpInline">
                  <small id="telHelpInline" class="text-muted">
                      eg. 0412 345 678.
                  </small>
                </div>
              </div>
              <input type="hidden" name="UserID" id="UserID">
              <input type="hidden" name="sPrivilege" id="sPrivilege" value="1">
              <input type="hidden" name="<?=$csrf['name'];?>" id="csrf_test_name"  value="<?=$csrf['hash'];?>">
              <!--  mode 1 = add 2=edit-->
              <input type="hidden" name="action_mode" id="action_mode" value="1"><br>
              <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-register2">Register</button><br>
            </form>
          </div>
        </div>
      </div>
