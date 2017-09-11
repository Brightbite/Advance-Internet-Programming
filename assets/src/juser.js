$(document).ready(function(){
  console.log('document load done.');
  userlist();


  $('#btn-register').click(function(){
      register();
  });

  $('#btn-register2').click(function(){
      register2();
  });

  $('#btn-signIn').click(function(){
      SignIn();
  });

  $('#clk-Product').click(function(){
      showProduct();
  });

});
// show ADD new user popup modal
  function Addnewuser(){
       $('#myModalLabel').text('ADD NEW USER');
  }

  function showProduct(){
      var prod_ID = $('#prod_ID').val();
      console.log('Product ID# '+ prod_ID);
      $.ajax({
        url:'product',                                       //route
        data:{prod_ID:prod_ID},
        method:"GET"
      })
      .done(function(pResult) {
          console.log('done');
          // window.location='product';
          //  $('#prod_page').html(pResult);

      })
      .fail(function(jqXHR, textStatus){

          alert('Error:'+ jqXHR +' '+ textStatus);

      });
  }
//
// function Cart(){
//
//         $.ajax({
//           url:'cart',                                       //route
//           data:{},
//           method:"GET"
//         })
//         .done(function(cResult) {
//
//              $('#UserCart').html(cResult);
//
//         })
//         .fail(function(jqXHR, textStatus){
//
//             alert('Error:'+ jqXHR +' '+ textStatus);
//
//         });
//   }

//Edit user popup
function EditLine(UserID,Fristname,Lastname,Address,Username,Password,Email,Tel,Privilege){
     $('#myModalLabel').text('EDIT USER');
     $('#sFirstname').val(Fristname);
     $('#sLastname').val(Lastname);
     $('#sAddress').val(Address);
     $('#sUsername').val(Username);
     $('#sPassword').val(Password);
     $('#sEmail').val(Email);
     $('#sTel').val(Tel);
     $('#UserID').val(UserID);
     $('#action_mode').val(2);
     $('#sPrivilege option[value='+Privilege+']').attr('selected','selected');

}

function SignIn(){
    var username = $('#username').val();
    var password = $('#password').val();
    console.log('validated '+ username + password);
         $.ajax({
           url:'login',
           data:{username:username,password:password},
           method:"POST"
         })
         .done(function(data){
           console.log(data);
           if (data.trim() == 'false'){

              alert('!username or pw incorect');
           }else {
             switch (data.trim()) {
                case '':
                         window.location='home';
                break;

                case '1':
                         window.location='home';
                break;

                case '2':
                          window.location='user';
                break;

                case '3':
                         window.location='user';
                break;
             }
           }
          //  $('#UserList').html(data);
           $('#sModal').modal('hide');
           $('body').removeClass('modal-open');
           $('.modal-backdrop').remove();
         })
         .fail(function(jqXHR, textStatus){
             alert('Error:'+ jqXHR +' '+ textStatus);
         });

}

// show userlist
function userlist(){
  var fristname_f = $('#fristname_f').val();
  var lastname_f = $('#lastname_f').val();
  var email_f = $('#email_f').val();

      $.ajax({
        url:'user_list',                                       //route
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
//register
function register(){

      if ($('#sFirstname').val().length == 0) {
          $('#sFirstname').focus();
      }

     else if ($('#sLastname').val().length == 0) {
              $('#sLastname').focus();
            }

     else if ($('#sAddress').val().length == 0) {
              $('#sAddress').focus();
            }

     else if ($('#sUsername').val().length == 0) {
              $('#sUsername').focus();
            }

     else if ($('#sPassword').val().length == 0){
              $('#sPassword').focus();
            }

     else if ($('#sEmail').val().length == 0) {
              $('#sEmail').focus();
            }

     else if ($('#sTel').val().length == 0){
              $('#sTel').focus();

      }else{
            console.log('validate done');                      //validate process
            var UserID = $('#UserID').val();
            var sFirstname = $('#sFirstname').val();
            var sLastname = $('#sLastname').val();
            var sAddress = $('#sAddress').val();
            var sUsername = $('#sUsername').val();
            var sPassword = $('#sPassword').val();
            var sEmail = $('#sEmail').val();
            var sTel = $('#sTel').val();
            var sPrivilege = $('#sPrivilege').val();
            var action_mode = $('#action_mode').val();
            console.log(action_mode);                          //check mode 1 add or 2 edit
            console.log('firstname: ' + sFirstname + ' lastname: ' + sLastname + ' username: ' + sUsername + ' password: ' +  sPassword + ' Email: '+ sEmail + ' Tel: ' + sTel + sPrivilege);                     //check dob and gender parameter
            $.ajax({
              url:'save',
              data:{UserID:UserID,sPrivilege:sPrivilege,sFirstname:sFirstname,sLastname:sLastname,sAddress:sAddress,sUsername:sUsername,sPassword:sPassword,sEmail:sEmail,sTel:sTel,action_mode:action_mode},
              method:"post"
            })
            .done(function(tResult) {
                  console.log('done');                        //check processing
                  if (tResult == 'error') {
                      alert('!Cannot to save.');
                  }else{
                    // clear form
                    $('#sFirstname').val('');
                    $('#sLastname').val('');
                    $('#sAddress').val('');
                    $('#sUsername').val('');
                    $('#sPassword').val('');
                    $('#sEmail').val('');
                    $('#sTel').val('');
                    $('#sPrivilege').val();
                    $('#action_mode').val(1);
                    // close popup form
                     $('#userform').modal('hide');
                     $('body').removeClass('modal-open');
                     $('.modal-backdrop').remove();
                  //  $('#obtcls').click();
                    //update user grid
                    userlist();
                  }

            })
            .fail(function(jqXHR, textStatus){
                alert('Error:'+ jqXHR +' '+ textStatus);
            });
      }
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

function register2(){

      if ($('#sFirstname').val().length == 0) {
          $('#sFirstname').focus();
      }

     else if ($('#sLastname').val().length == 0) {
              $('#sLastname').focus();
            }

     else if ($('#sAddress').val().length == 0) {
              $('#sAddress').focus();
            }

     else if ($('#sUsername').val().length == 0) {
              $('#sUsername').focus();
            }

     else if ($('#sPassword').val().length == 0){
              $('#sPassword').focus();
            }

     else if ($('#sEmail').val().length == 0) {
              $('#sEmail').focus();
            }

     else if ($('#sTel').val().length == 0){
              $('#sTel').focus();

    }else{
      console.log('validate done');                      //validate process
      var UserID = $('#UserID').val();
      var sFirstname = $('#sFirstname').val();
      var sLastname = $('#sLastname').val();
      var sAddress = $('#sAddress').val();
      var sUsername = $('#sUsername').val();
      var sPassword = $('#sPassword').val();
      var sEmail = $('#sEmail').val();
      var sTel = $('#sTel').val();
      var sPrivilege = $('#sPrivilege').val();
      var action_mode = $('#action_mode').val();
      console.log(action_mode);                          //check mode 1 add or 2 edit
      console.log('firstname: ' + sFirstname + ' lastname: ' + sLastname + ' username: ' + sUsername + ' password: ' +  sPassword + ' Email: '+ sEmail + ' Tel: ' + sTel );                     //check dob and gender parameter
      $.ajax({
        url:'save',
        data:{UserID:UserID,sPrivilege:sPrivilege,sFirstname:sFirstname,sLastname:sLastname,sAddress:sAddress,sUsername:sUsername,sPassword:sPassword,sEmail:sEmail,sTel:sTel,action_mode:action_mode},
        method:"post"
      })
      .done(function(tResult) {
        console.log('done');                        //check processing
        if (tResult == 'error') {
        }else{
            // clear form
          $('#sFirstname').val('');
          $('#sLastname').val('');
          $('#sAddress').val('');
          $('#sPassword').val('');
          $('#sEmail').val('');
          $('#sTel').val('');
          $('#action_mode').val(1);
          // close popup form
          $('#userform').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          alert('Thank you ' + sFirstname + ', your account successfully created !');
          $('body').load('home');
          }
        })
        .fail(function(jqXHR, textStatus){
            alert('Error:'+ jqXHR +' '+ textStatus);
        });
      }
}
