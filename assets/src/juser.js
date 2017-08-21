$(document).ready(function(){
  //console.log('document load done.');
  userlist();

  $('#btn-register').click(function(){
      register();
  });
});

function Addnewuser(){
     $('#myModalLabel').text('ADD NEW USER');
}

function EditLine(UserID,Fristname,Lastname,UserDOB,Gender){
     $('#myModalLabel').text('EDIT USER');
     $('#sFirstname').val(Fristname);
     $('#sLastname').val(Lastname);
     $('#sDob').val(UserDOB);
     $('#gender').val(Gender);
     $('#UserID').val(UserID);
     $("input:radio").prop("checked", false);
     $("input:radio[value="+Gender+"]").prop("checked", true);
     $('#action_mode').val(2);

}

function select_gender(gender){
         $("#gender").val(gender);
}

// แสดงข้อมูลผู้ใช้
function userlist(){
      $.ajax({
        url:'user_list',
        data:{},
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
      }else{
            console.log('validate done');
            var UserID = $('#UserID').val();
            var sFirstname = $('#sFirstname').val();
            var sLastname = $('#sLastname').val();
            var sDob = $('#sDob').val();
            var sGender = $('#gender').val();
            var action_mode = $('#action_mode').val();
            console.log(action_mode);
            console.log(sDob+'+'+sGender);
            $.ajax({
              url:'save',
              data:{UserID:UserID,sFirstname:sFirstname,sLastname:sLastname,sDob:sDob,sGender:sGender,action_mode:action_mode},
              method:"post"
            })
            .done(function(tResult) {
                  console.log('done');
                  if (tResult == 'error') {
                      alert('!Cannot to save.');
                  }else{
                    // clear form
                    $('#sFirstname').val('');
                    $('#sLastname').val('');
                    $('#sDob').val('');
                    $('#sDob').val('male');
                    $('#action_mode').val(1);

                    // close popup form
                    $('#userform').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

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
