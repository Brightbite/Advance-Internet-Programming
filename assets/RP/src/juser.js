$(document).ready(function(){
  //console.log('document load done.');
  rUserlist();

  $('#btn-register').click(function(){
      register();
  });
});
//show ADD new user popup modal
function Addnewuser(){
     $('#myModalLabel').text('ADD NEW USER');
}
//Edit user popup
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
// show userlist
function rUserlist(){
  var fristname_f = $('#fristname_f').val();
  var lastname_f = $('#lastname_f').val();
  var gender_f = $('#gender_f').val();
      $.ajax({
        url:'rUser_list',                                       //route
        data:{fristname_f:fristname_f,lastname_f:lastname_f,gender_f:gender_f},
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
            console.log('validate done');                      //validate process
            var UserID = $('#UserID').val();
            var sFirstname = $('#sFirstname').val();
            var sLastname = $('#sLastname').val();
            var sDob = $('#sDob').val();
            var sGender = $('#gender').val();
            var action_mode = $('#action_mode').val();
            console.log(action_mode);                          //check mode 1 add or 2 edit
            console.log(sDob+'+'+sGender);                     //check dob and gender parameter
            $.ajax({
              url:'rSave',
              data:{UserID:UserID,sFirstname:sFirstname,sLastname:sLastname,sDob:sDob,sGender:sGender,action_mode:action_mode},
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
                    $('#sDob').val('');
                    $('#sDob').val('male');
                    $('#action_mode').val(1);
                    // close popup form
                    $('#userform').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    //update user grid
                    rUserlist();
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
              url:'rRemove',
              data:{UserID:UserID,Fristname:Fristname},
              method:"GET"
            })
            .done(function(tResult) {
                 if (tResult == 'error') {
                     alert('!Cannot delete user.');
                 }else{
                     rUserlist();
                 }
            })
            .fail(function(jqXHR, textStatus){
                alert('Error:'+ jqXHR +' '+ textStatus);
            });
      }

}
