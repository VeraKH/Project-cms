<?php
include ("head.php");
?>

  <header class="admin">
            <a class= "logo" title="JClass" href="http://jclass.com "><span>JClass</span></a>
            <div class="hero">
                    <h1>Admin panel</h1>
            </div>
        </header>

    <nav class="admin-panel">
                <ul>
                    <li>
                        <a title = "About Us" href="#" area-haspopup="true">Manage Website Content</a>
                             <ul>
                                 <li>
                                     <a title = "Sub link one" href="#">Sub link one</a>
                                 </li>
                                  <li>
                                     <a title = "Sub link two" href="#">Sub link two</a>
                                 </li>
                             </ul>
                    </li>
                    <li>
                        <a title = "Teacher's corner" href="#">Manage Admin Users</a>
                    </li>
                     <li>
                        <a title = "Learning tools" href="#">Manage users</a>
                    </li>
                     <li>
                        <a title = "Contact Us" href="#">Log out</a>
                    </li>
                </ul>
        </nav>

     <?php
    include ("footer.php");
    ?>
