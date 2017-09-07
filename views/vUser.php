  <!-- <body> -->
      <div class="container">
        <h1 class="my-4"><?php echo $top; ?></h1>
          <div class="row">

              <div class="col-md-3">
                 <input type="text" name="fristname_f" id="fristname_f" placeholder="fristname" class="form-control pull-left">
              </div>
              <div class="col-md-3">
                <input type="text" name="lastname_f" id="lastname_f" placeholder="lastname" class="form-control">
              </div>
              <div class="col-md-3">
                <input type="text" name="email_f" id="email_f" placeholder="email" class="form-control">
              </div>


            <div class="col-md-3">
                <button type="button" name="button" class="btn btn-info " onclick="userlist()">Search</button>
                <button type="button" name="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#userform" onclick="Addnewuser()">Register</button>
            </div>
          </div>
          <br>
          <div class="col-md-12 UserList" id="UserList">Load...</div>
           <!--  form Add User-->
           <div class="modal fade" id="userform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">ADD NEW USER</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <!--popup form-->
                          <div class="modal-body">
                              <form method="post" id="formadduser"  enctype="multipart/form-data">
                                First name:<br>
                                <input type="text" name="sFirstname" id="sFirstname" class="form-control" required autocomplete="false" placeholder="Firstname" maxlength="20"><br>
                                Last name:<br>
                                <input type="text" name="sLastname" id="sLastname" class="form-control" required placeholder = "Lastname" maxlength="20"><br>
                                Address:<br>
                                <input type="text" name="sAddress" id="sAddress" class="form-control" required  placeholder="Street / City / Country" maxlength="100"><br>

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
                                    <input type="text" name="sPassword" id="sPassword" class="form-control" required placeholder="Password" maxlength="20" aria-describedby="passwordHelpInline">
                                    <small id="passwordHelpInline" class="text-muted">
                                      Maximum 20 characters long.
                                    </small>
                                  </div>
                                </div>

                                  <div class="form-group row">
                                    <label class="col-md-6 col-form-label">Email</label>
                                    <label class="col-md-6 col-form-label">Contact Number</label>
                                    <div class="col-md-6">
                                    <input type="text" name="sEmail" id="sEmail" class="form-control" required placeholder="Example@email.com" maxlength="50" aria-describedby="emailHelpInline">
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

                                  <div class="col-md-6">
                                    <label class="col-md-6 col-form-label">Privilege</label>
                                    <!-- <input type="text" name="sPrivilege" id="sPrivilege" class="form-control" required placeholder="Privilege" maxlength="2"><br>
                                    <?php echo $PrivilegeID?> -->
                                    <!-- </?php echo $PrivDesc?> -->
                                  <select class="form-control" id="sPrivilege">
                                      <option>Privilege</option>
                                      <?php foreach ($PrivList as $pvl) {?>
                                        <option value="<?php echo $pvl->PrivilegeID;?>"><?php echo $pvl->PrivilegeDesc;?></option>
                                      <?php } ?>
                                  </select>
                                  </div>
                                </div>
                                <input type="hidden" name="" id="UserID">
                                <input type="hidden" name="" id="sPrivilegeID" value="1">
                                <!--  mode 1 = add 2=edit-->
                                <input type="hidden" name="" id="action_mode" value="1"><br>
                                <div class="pull-right">
                                  <input type="button" value="Save" class="btn btn-success" id="btn-register">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="obtcls">Close</button>
                                </div>
                                <br><hr>
                              </form>
                          </div>
                     </div>
                </div>
           </div>
           <!--  End Form-->
      </div>
