# Retailer web Application
- Kunanon Pititheerachot 12634123
- Advanced Internet Programming Project Spring 2017

# Installation and Configuration

  1. Clone or Download the repository
  2. Create your own database and put database credential in application/config/database.php
  3. Set up your base URL or website domain in application/config/config.php

# Running Retail Web App

  1. Make sure you have properly database and base URL configuration for your own website.
  2. Upload all your files including your configuration files up to the cloud service via FTP or Github.
  3. Check your web service with URL you put in configuration.

# API

 - Retail web app API you could creating an account and accessing to your user data or delete via a RESTful API.

 - create account:
  https://kunanonapi.000webhostapp.com/create

 example of create user account via API

 Body
 <!-- body -->
    <div class="container">
      <h1 class="my-4  text-info"></h1>
        <div class="row">
          <div class="col-md-12 text-secondary">
            <hr>
            <form method="post"  enctype="multipart/form-data" action="https://kunanonapi.000webhostapp.com/create">
              First name:<br>
              <input type="text" name="customerFirstname"  class="form-control"   autocomplete="false" placeholder="Firstname" maxlength="20"><br>
              Last name:<br>
              <input type="text" name="customerLastname" class="form-control"   placeholder = "Lastname" maxlength="20"><br>
              Address1:<br>
              <input type="text" name="customerAdd1"  class="form-control"    placeholder="Address Line 1" maxlength="100"><br>
              Address Line 2<br>
              <input type="text" name="customerAddr2"  class="form-control"    placeholder="Address Line 2" maxlength="100"><br>

              <label class="col-md-12 col-form-label">City</label><br>
                <input type="text" name="customerCity"  class="form-control"    placeholder="City" maxlength="100"><br>

              <label class="col-md-6 col-form-label">State</label><br>
                <input type="text" name="customerState"  class="form-control"   placeholder="State" maxlength="10" ><br>

              <label class="col-md-6 col-form-label">Postcode</label><br>
                <input type="text" name="customerPostcode"  class="form-control"   placeholder="Postcode" maxlength="10"><br>

              <label class="col-md-12 col-form-label">Country</label><br>
                <input type="text" name="customerCountry"  class="form-control"   placeholder="Country" maxlength="20"><br>

              <label class="col-md-6 col-form-label">Username</label><br>
                <input type="text" name="customerUsername" class="form-control"   placeholder="Username" maxlength="20" aria-describedby="usernameHelpInline"><br>

              <label class="col-md-6 col-form-label">Password</label><br>
                <input type="password" name="customerPassword"  class="form-control"   placeholder="Password" maxlength="20" aria-describedby="passwordHelpInline"><br>

              <label class="col-md-6 col-form-label">Email</label><br>
                <input type="text" name="customerEmail" class="form-control"   placeholder="Example@email.com" maxlength="50" aria-describedby="emailHelpInline"><br>

              <label class="col-md-6 col-form-label">Contact Number</label><br>
                <input type="text" name="customerTel"  class="form-control"   placeholder="Contact number" maxlength="20" aria-describedby="telHelpInline"><br>

                </div>
              </div>
              <input type="submit" value="Register New Account" class="btn btn-primary btn-lg btn-block"><br><hr>
            </form>
          </div>
<!-- end of body -->

  which is I already put an example in this project you can test it by access through route (your web url)/api/create

  - delete account
  which is I already put an example in this project you can test it by access through route (your web url)/api/delete=(user ID that you want to delete)

  - read userlist
  which is I already put an example in this project you can test it by access through route (your web url)/api/read

  OR

  you can use these RESTful API with your own application.


# Files naming

  1. Controllers files are using 'c' following by name such as cHome.php, cRegister.php, cLogin.php, etc.
  2. Models files are using 'm' following by model name such as mProduct.php, mCart.php, mUser.php, etc.
  3. Views files are using 'v' following by view name such as vHome.php, vMyaccount.php, vUser.php, etc.


# Key Principles

* DRY - Don’t repeat yourself
* Abstraction Principle
* KISS (Keep it simple, stupid!)
* Avoid Creating a YAGNI (You aren’t going to need it)
* Do the simplest thing that could possibly work
* Don’t make me think
* Open/Closed Principle
* Single Responsibility Principle
* Maximize Cohesion
* Avoid Premature Optimization
*	Code Reuse is Good
*	Separation of Concerns
* Law of Demeter
* Write Code for the Maintainer
* Principle of least astonishment

###
