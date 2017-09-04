<table class="table">
      <!--Column-->
       <tr>
         <th>No.</th>
         <th>Firstname</th>
         <th>Lastname</th>
         <th>Email</th>
         <th>Password</th>
         <th></th>
         <th></th>
       </tr>
       <!--Pull the updateData-->
       <?php if ($aUser == 'empty') {
                echo '<tr><td colspan="7">Empty Data.</td></tr>';
             }else{
              $No = 1;
              foreach ($aUser as $user) {
                $ID = $user->ID;
                $firstname = $user->firstname;
                $lastname = $user->lastname;
                $email = $user->email;
                $password = $user->password;
       ?>
       <!--Show updated data-->
               <tr>
                 <td><?php echo $No;?></td>
                 <td><?php echo $user->firstname; ?></td>
                 <td><?php echo $user->lastname; ?></td>
                 <td><?php echo $user->email; ?></td>
                 <td><?php echo $user->password; ?></td>
                 <td><button type="button" name="button" data-toggle="modal" data-target="#userform" class="btn btn-primary pull-right" onclick="EditLine('<?=$ID?>','<?=$firstname?>','<?=$lastname?>','<?=$email?>','<?=$password?>')">Edit</button></td>
                 <td><button type="button" name="button" class="btn btn-danger pull-right" onclick="DeleteUser('<?=$ID?>','<?=$firstname?>')">Delete</button></td>
               </tr>
     <?php   ++$No; } //end foreach
            } //end else
     ?>
</table>
