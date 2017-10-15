$(document).ready(function(){
  userlist();

//admin register button from vUser
  $('#btn-register').click(function(){
      register();
  });
//customer register button vRegister
  $('#btn-register2').click(function(){
      register2();
  });
//Login button signin navbar
  $('#btn-signIn').click(function(){
      SignIn();
  });
//password reset button signin navbar
  $('#btn-reset').click(function(){
    resetPassword();
  })
});

// show ADD new user popup modal
  function Addnewuser(){
       $('#myModalLabel').text('ADD NEW USER');
  }

//reset password
  function resetPassword(){
    //validate form input
    if(sEmail.value == '') {
      sEmail.setCustomValidity("Email is required");
    }else if(sPassword2.value == ''){
      sPassword2.setCustomValidity("New Password is required");
    }else if(sPassword2.value != sPassword.value) {
    sPassword.setCustomValidity("Passwords Don't Match");
    } else {
      if (confirm('Are you sure you want to reset your password ?')) {
          $.ajax({
            url:'update',
            data:$('#formreset').serialize(),
            method:"POST"
          })
        .done(function(data){
          if (data.trim() == 'false'){
             alert('incorrect email!');
          }
          alert('Your password successfully changed !');
          $('#sModal').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          location.reload();
        })
        .fail(function(jqXHR, textStatus){
            alert('Error:'+ jqXHR +' '+ textStatus);
        });
      } //end if
  } // end else
}

//Edit user popup modal with prefil user information
function EditLine(UserID,Firstname,Lastname,Addr1,Addr2,City,State,Postcode,Country,Username,Password,Email,Tel,Privilege){
     $('#myModalLabel').text('EDIT USER');
     $('#UserID').val(UserID);
     $('#sFirstname').val(Firstname);
     $('#sLastname').val(Lastname);
     $('#sAddress1').val(Addr1);
     $('#sAddress2').val(Addr2);
     $('#sCity').val(City);
     $('#sState').val(State);
     $('#sPostcode').val(Postcode);
     $('#sCountry').val(Country);
     $('#sUsername').val(Username);
     $('#sPassword').val(Password);
     $('#sEmail').val(Email);
     $('#sTel').val(Tel);
     $('#sPrivilege option[value='+Privilege+']').attr('selected','selected');
     $('#action_mode').val(2);
}

//signin
function SignIn(){
         $.ajax({
           url:'login',
           data:$('#formsignin').serialize(),
           method:"POST"
         })
         .done(function(data){
           if (data.trim() == 'false'){
              alert('Incorrect username or password! Please try again.');
           }else {
             //check user priviledge and show different page after login
             switch (data.trim()) {
                case '': //customer
                         window.location = 'home';
                break;

                case '1': //customer
                         window.location = 'home';
                break;

                case '2': //admin
                        window.location = 'user';
                break;

                case '3': //super admin
                        window.location = 'user';
                break;
             }
           }
         })
         .fail(function(jqXHR, textStatus){
             alert('Error:'+ jqXHR +' '+ textStatus);
         });
}

//show userlist
function userlist(){
  var fristname_f = $('#fristname_f').val();
  var lastname_f = $('#lastname_f').val();
  var email_f = $('#email_f').val();
      $.ajax({
        url:'user_list',
        data:{fristname_f:fristname_f,lastname_f:lastname_f,email_f:email_f},
        method:"GET"
      })
      .done(function(tResult) {
           $('#UserList').html(tResult);
      })
      .fail(function(jqXHR, textStatus){
          alert('Error:'+ jqXHR +' '+ textStatus);
      });
}

//admin register
function register(){
            $.ajax({
              url:'save',
              data:$('#formadduser').serialize(),
              method:"POST"
            })
            .done(function(tResult) {
                  if (tResult == 'error') {
                      alert('!Cannot save.');
                  }else{
                    $('#userform').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    userlist();
                  }
            })
            .fail(function(jqXHR, textStatus){
                alert('Error:'+ jqXHR +' '+ textStatus);
            });
}

//customer register
function register2(){
            $.ajax({
              url:'save',
              data:$('#formadduser2').serialize(),
              method:"POST"
            })
            .done(function(tResult) {
              if (tResult == 'error') {
                alert('Register Failed!');
              }else{
                $('#action_mode').val(1);
                alert('Thank you for you registration with us, your account successfully created !');
                window.location = 'home';
               }
            })
            .fail(function(jqXHR, textStatus){
              alert('Error:'+ jqXHR +' '+ textStatus);
            });
}

//Delete User
 function DeleteUser(UserID,Fristname){
    if (confirm('Are you sure to delete user ' + Fristname)) {
            $.ajax({
                    url:'remove',
                    data:{UserID:UserID,Fristname:Fristname},
                    method:"GET"
                  })
                  .done(function(tResult) {
                       if (tResult == 'error') {
                           alert('!Cannot delete user.');
                       }else{
                           userlist();
                       }
                  })
                  .fail(function(jqXHR, textStatus){
                      alert('Error:'+ jqXHR +' '+ textStatus);
                  });
            }
}
