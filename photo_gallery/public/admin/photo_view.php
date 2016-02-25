<?php 
include ("../../includes/layouts/admin-header.php");
require_once ("../../includes/initialize.php");

 if (!$session->IsLoggedIn()) { RedirectTo("login.php");  } 

 ?>
<section  class="page-cont">
             <div>
             <h2>Photo view</h2>

                          <table>
               <tr>   
           <th>Photo</th>
            <th>Filename</th>
           <th>Caption</th>
            <th>Size</th>
           <th>Type</th>
          </tr>
      <?php 
      $photos = Photograph::FindAll();
       foreach ($photos as $photo ) { ?>
         <tr>
         	<td><img src="../<?php echo $photo->ImagePath();?>" width="200px;"</td>
            <td><?php echo $photo->filename; ?></td>
            <td><?php echo $photo->caption; ?></td>
            <td><?php echo $photo->SizeAsText(); ?></td>
            <td><?php echo $photo->type; ?></td>
          </tr>
        <?php } ?>
       </table>
            </div>
</section>


<?php include("../../includes/layouts/footer.php"); ?>


