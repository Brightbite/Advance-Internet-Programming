<table class="table">
      <!--Column-->
       <tr>
         <th>No.</th>
         <th>Firstname</th>
         <th>Lastname</th>
         <th>Address</th>
         <th>Username</th>
         <th>Password</th>
         <th>Email</th>
         <th>Contact</th>
         <th>Privilege</th>
         <th></th>
         <th></th>
       </tr>
       <!--Pull the updateData-->
       <?php if ($aUser == 'empty') {
                echo '<tr><td colspan="7">Empty Data.</td></tr>';
             }else{
              $No = 1;
              foreach ($aUser as $user) {
                $CustomerID = $user->CustomerID;
                $CustomerFirstname = $user->CustomerFirstname;
                $CustomerLastname = $user->CustomerLastname;
                $CustomerAddr = $user->CustomerAddr;
                $Username = $user->Username;
                $Password = $user->Password;
                $Email = $user->Email;
                $CustomerTel = $user->CustomerTel;
                $PrivilegeID = $user->PrivilegeID;

       ?>
       <!--Show updated data-->
               <tr>
                 <td><?php echo $No; ?></td>
                 <td><?php echo $user->CustomerFirstname; ?></td>
                 <td><?php echo $user->CustomerLastname; ?></td>
                 <td><?php echo $user->CustomerAddr; ?></td>
                 <td><?php echo $user->Username; ?></td>
                 <td><?php echo $user->Password; ?></td>
                 <td><?php echo $user->Email; ?></td>
                 <td><?php echo $user->CustomerTel; ?></td>
                 <td><?php echo $user->PrivilegeID; ?></td>
                 <td><button type="button" name="button" data-toggle="modal" data-target="#userform" class="btn btn-primary pull-right" onclick="EditLine('<?=$CustomerID?>','<?=$CustomerFirstname?>','<?=$CustomerLastname?>','<?=$CustomerAddr?>','<?=$Username?>','<?=$Password?>','<?=$Email?>','<?=$CustomerTel?>','<?=$PrivilegeID?>')">Edit</button></td>
                 <td><button type="button" name="button" class="btn btn-danger pull-right" onclick="DeleteUser('<?=$CustomerID?>','<?=$CustomerFirstname?>')">Delete</button></td>
               </tr>
     <?php   ++$No; } //end foreach
            } //end else
     ?>
</table>
