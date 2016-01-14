<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/functions.php"); ?>

<?php include ("head.php"); ?>

     <header class="admin">
            <a class= "logo" title="JClass" 
            <?php if(LoggedIn()){ 
            	echo "href=\"admin.php\""; 
            } else {
            	echo  "href=\"index.php\"";
            }
            ?>><span>JClass</span></a>
            <div class="hero">
                    <h1>Admin panel</h1>
            </div>
        </header>
               
                 <?php  echo AdminNavigation(); ?>
                
        
