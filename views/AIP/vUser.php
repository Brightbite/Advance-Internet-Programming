<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url('application/assets/AIP/css/'); ?>bootstrap.css">
  </head>

  <body>
      <div class="container">
          <div class="col-md-6">
               <h3>AIP User List</h3>
          </div>
          <div class="row">
            <div class="col-md-6">
                 <button type="button" name="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#userform" onclick="Addnewuser()">+ ADD</button>
            </div>
              <div class="col-md-3">
                 <input type="text" name="fristname_f" id="fristname_f" placeholder="fristname" class="form-control">
              </div>
              <div class="col-md-3"> <input type="text" name="lastname_f" id="lastname_f" placeholder="lastname" class="form-control"></div>
              <div class="col-md-3">
                <select class="from-control" name="gender_f" id="gender_f">
                                 <option value="">gender</option>
                                 <option value="male">male</option>
                                 <option value="female">female</option>
                                 <option value="other">other</option>
                 </select>
            </div>
            <div class="col-md-3">
                 <button type="button" name="button" class="btn btn-success" onclick="aUserlist()">Filter</button>
            </div>
          </div>

          <div class="col-md-12 UserList" id="UserList">Load...</div>
           <!--  form Add User-->
           <div class="modal fade" id="userform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                          <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title" id="myModalLabel">ADD NEW USER</h5>
                          </div>
                          <!--popup form-->
                          <div class="modal-body">
                              <form method="post" id="formadduser"  enctype="multipart/form-data">
                                First name:<br>
                                <input type="text" name="sFirstname" id="sFirstname" class="form-control" required autocomplete="false" placeholder="enter firstname" maxlength="20"><br>
                                Last name:<br>
                                <input type="text" name="sLastname" id="sLastname" class="form-control" required placeholder = "Lastname" maxlength="20"><br>
                                Date of birth:<br>
                                <input type="date" name="sDob" id="sDob" class="form-control" required><br>
                                Gender:<br>
                                <input type="radio" name="sGender" value="male" checked onclick="select_gender('male')"> Male<br>
                                <input type="radio" name="sGender" value="female" onclick="select_gender('female')"> Female<br>
                                <input type="radio" name="sGender" value="other" onclick="select_gender('other')"> Other<br>
                                <input type="hidden" name="" id="gender" value="male">
                                <input type="hidden" name="" id="UserID">
                                <!--  mode 1 = add 2=edit-->
                                <input type="hidden" name="" id="action_mode" value="1"><br>
                                <div class="pull-right">
                                  <input type="button" value="Save" class="btn btn-success" id="btn-register">
                                  <input type="reset" value="Reset" class="btn btn-default">
                                </div>
                                <br><hr>
                              </form>
                          </div>
                     </div>
                </div>
           </div>
           <!--  End Form-->
      </div>
      <!-- Javascript -->
      <script type="text/javascript" src="<?php echo base_url('application/assets/AIP/js/'); ?>jquery.js"></script>
      <script type="text/javascript" src="<?php echo base_url('application/assets/AIP/js/'); ?>bootstrap.js"></script>
      <script type="text/javascript" src="<?php echo base_url('application/assets/AIP/src/'); ?>juser.js"></script>
    </body>
</html>
