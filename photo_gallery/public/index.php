<?php 
require_once ("../includes/initialize.php");
IncludeLayout("head.php"); 
?>


        <header>
            <a class= "logo" title="JClass" href="http://localhost/~tsukomoto/project_cms/public/"><span>JClass</span></a>
            <div class="hero">
                    <h1>All you need is to learn Japanese</h1>
                    <a class="btn" ttitle="Get lessons from top teachers" href="#"><span>Register</span> And Start This Journey</a>
            </div>
        </header>

        <section class = "main">
             <aside>
                <div class = "content community">
                    <h3><a href="#inside-course"><?php echo "Hello"; ?></a></h3>
                     <p><?php echo "Hello";?></p>
                </div>
            </aside>
            
            <aside>
                <div class = "content stratagy">
                    <h3><a href="#inside-course"><?php echo "Hello"; ?></a></h3>
                     <p><?php echo "Hello" ;?></p>
                </div>
            </aside>
            
             <aside>
                <div class = "content tools">
                   <h3><a href="#inside-course"><?php echo "Hello"; ?></a></h3>
                    <p><?php echo "Hello";?></p>
                </div>
            </aside>
        </section>

         <section class = "atmosphere" id="atmo-anc">
            <article>
                <h2></h2>
                 <p></p>
                <a class = "btn" title ="Offering the best learning tools" href="#">Learn more</a>
            </article>
        </section>

        <section class = "how-to">
            <aside>
                <div class="content">
                        <img alt="Your account" src="img/photo_seating.jpg"/>
                       <h4></h4>
                        <p></p>
                        <a title="Use your personal cabinet." href="http://codifydesign.com">Learn more</a>
                </div>
            </aside>
            <aside>
                    <div class="content">
                        <img alt="Your account" src="img/photo_lighting.jpg"/>
                      <h4></h4>
                        <p></p>
                        <a title="Learn how to Whatch your learning statistics." href="http://codifydesign.com">Learn more</a>
                    </div>
            </aside>
            <blockquote>
                <p class="quote"><?php if(isset($database)){ echo "true"; } else { echo "false"; }?></p>
            <p class="credit"><strong><?php echo $database->EscapeValue("It's an Author name");?></strong><br><em> Business Title</em><br> Company</p>
            </blockquote>
        </section>

         <section class = "inside" id="inside-course">
            <article>
                <h2>What's inside the course</h2>
                 <p>
<?php 

            $user = User::FindById(1);
            echo $user->UsernamePassword();
            echo "<hr/>";

            $users = User::FindAll();
            foreach ($users as $user ) {
                   echo $user->UsernamePassword();
                   echo "<br/>";
            } 

 ?>
                     

                 </p> 
                <img id="inside-img" alt="Your account" src="img/photo_lighting.jpg"/>
                <img alt="Your account" src="img/photo_lighting.jpg"/>
                <img alt="Your account" src="img/photo_lighting.jpg"/>
                
            </article>
        </section>

       <nav>
            <p></p>
      </nav>


     <?php $context = "public"; ?>
    <?php include ("../includes/layouts/footer.php"); ?>