<table class="table">
      <!--Column-->
       <tr>
         <th>No.</th>
         <th>Firstname</th>
         <th>Lastname</th>
         <th>DOB</th>
         <th>Gender</th>
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
                $Firstname = $user->Firstname;
                $Lastname = $user->Lastname;
                $DOB = $user->DOB;
                $Gender = $user->Gender;
       ?>
       <!--Show updated data-->
               <tr>
                 <td><?php echo $No;?></td>
                 <td><?php echo $user->Firstname; ?></td>
                 <td><?php echo $user->Lastname; ?></td>
                 <td><?php echo $user->DOB; ?></td>
                 <td><?php echo $user->Gender; ?></td>
                 <td><button type="button" name="button" data-toggle="modal" data-target="#userform" class="btn btn-primary pull-right" onclick="EditLine('<?=$ID?>','<?=$Firstname?>','<?=$Lastname?>','<?=$DOB?>','<?=$Gender?>')">Edit</button></td>
                 <td><button type="button" name="button" class="btn btn-danger pull-right" onclick="DeleteUser('<?=$ID?>','<?=$Firstname?>')">Delete</button></td>
               </tr>
     <?php   ++$No; } //end foreach
            } //end else
     ?>
</table>
