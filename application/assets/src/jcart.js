$(document).ready(function(){

  $('#btn-signIn').click(function(){
      SignIn();
  });

});

//signin in cart page
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
