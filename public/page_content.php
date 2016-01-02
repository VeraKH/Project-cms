<?php include ("../includes/layouts/head.php"); ?>
<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>

<?php  FindSelectedPage(); ?> 

        <header>
            <a class= "logo" title="JClass" href="http://jclass.com "><span>JClass</span></a>
            <div class="hero">
                    <h1>All you need is to learn Japanese</h1>
                    <a class="btn" ttitle="Get lessons from top teachers" href="#"><span>Get Lessons From</span> Top Teachers</a>
            </div>
        </header>


         <section class = "inside" id="inside-course">
            <article>
                <h2>What's inside the course</h2>
                <?php echo htmlentities($current_page["content"]); ?> <br />
                <img alt="Your account" src="img/photo_lighting.jpg"/>
                <img alt="Your account" src="img/photo_lighting.jpg"/>
                <img alt="Your account" src="img/photo_lighting.jpg"/>
                
            </article>
        </section>

       <nav>
           <p> <?php echo Navigation($current_subject, $current_page); ?> </p>
      </nav>
       </section>


    <?php
       include ("../includes/layouts/footer.php");
    ?>