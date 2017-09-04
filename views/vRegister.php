<!-- <body> -->
    <div class="container">
      <h1 class="my-4"><?php echo $top; ?></h1>

        <div class="row">
          <div class="col-md-12">
            <h3 class="my-4"><?php echo $topic;?></h3>
            <hr>

            <form method="post" id="formadduser"  enctype="multipart/form-data">
              First name:<br>
              <input type="text" name="sFirstname" id="sFirstname" class="form-control" required autocomplete="false" placeholder="enter firstname" maxlength="20"><br>
              Last name:<br>
              <input type="text" name="sLastname" id="sLastname" class="form-control" required placeholder = "Lastname" maxlength="20"><br>
              <div class="form-group row">
                <label class="col-md-6 col-form-label">Email</label>
                <label class="col-md-6 col-form-label">Password</label>
                <div class="col-md-6">
                  <input type="text" name="sEmail" id="sEmail" class="form-control" required placeholder="Example@email.com" maxlength="50" aria-describedby="emailHelpInline">
                  <small id="emailHelpInline" class="text-muted">
                      Must be available email.
                  </small>
              </div>
                <div class="col-md-6">
                <input type="text" name="sPassword" id="sPassword" class="form-control" required placeholder="Password" maxlength="20" aria-describedby="passwordHelpInline">
                <small id="passwordHelpInline" class="text-muted">
                  Maximum 20 characters long.
                </small>
              </div>
              </div>
              <input type="hidden" name="" id="UserID">
              <!--  mode 1 = add 2=edit-->
              <input type="hidden" name="" id="action_mode" value="1"><br>

                <input type="button" value="Register New Account" class="btn btn-primary btn-lg btn-block" id="btn-register2">

              <br><hr>
            </form>
          </div>
        </div>
      </div>
