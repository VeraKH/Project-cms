<?php include ("../includes/layouts/head.php"); ?>
<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>

<?php  FindSelectedPage(true); ?> 

        <header>
            <a class= "logo" title="JClass" href="http://localhost/~tsukomoto/project_cms/public/index.php"><span>JClass</span></a>
            <div class="hero">
                    <h1>All you need is to learn Japanese</h1>
                    <a class="btn" ttitle="Get lessons from top teachers" href="#"><span>Get Lessons From</span> Top Teachers</a>
            </div>
        </header>


         <section class = "inside" id="inside-course">
            <article>

            <?php if ($current_page) {?>
            <h2><?php echo htmlentities($current_page["menu_name"]); ?></h2> 
            <p><?php echo nl2br(htmlentities($current_page["content"])); ?></p>
            <?php }  else {?>
            <h2>Happy New Year! </h2>
            <?php }?>
                
            </article>

       <nav>
           <p> <?php echo Navigation($current_subject, $current_page, $public=true); ?> </p>
      </nav>
       </section>


    <?php
       include ("../includes/layouts/footer.php");
    ?>