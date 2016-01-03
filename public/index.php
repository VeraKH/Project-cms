<?php include ("../includes/layouts/head.php"); ?>
<?php require_once ("../includes/session.php"); ?>
<?php require_once ("../includes/db_connect.php"); ?>
<?php require_once ("../includes/functions.php"); ?>

<?php  FindSelectedPage(); ?> 

        <header>
            <a class= "logo" title="JClass" href="http://localhost/~tsukomoto/project_cms/public/"><span>JClass</span></a>
            <div class="hero">
                    <h1>All you need is to learn Japanese</h1>
                    <a class="btn" ttitle="Get lessons from top teachers" href="#"><span>Get Lessons From</span> Top Teachers</a>
            </div>
        </header>

        <section class = "main">
             <aside>
                <div class = "content community">
                    <h3><a href="#inside-course"><?php echo FindSelectedSubjectTitle(55) ?></a></h3>
                     <p><?php echo FindSelectedContent(14, 170);?></p>
                </div>
            </aside>
            
            <aside>
                <div class = "content stratagy">
                    <h3><a href="#inside-course"><?php echo FindSelectedSubjectTitle(56) ?></a></h3>
                     <p><?php echo FindSelectedContent(17, 170);?></p>
                </div>
            </aside>
            
             <aside>
                <div class = "content tools">
                   <h3><a href="#inside-course"><?php echo FindSelectedSubjectTitle(57) ?></a></h3>
                    <p><?php echo FindSelectedContent(18, 170);?></p>
                </div>
            </aside>
        </section>

         <section class = "atmosphere" id="atmo-anc">
            <article>
                <h2><?php echo FindSelectedPageTitle(14) ?></h2>
                 <p><?php echo FindSelectedContent(14, 480);?></p>
                <a class = "btn" title ="Offering the best learning tools" href="#">Learn more</a>
            </article>
        </section>

        <section class = "how-to">
            <aside>
                <div class="content">
                        <img alt="Your account" src="img/photo_seating.jpg"/>
                       <h4><?php echo FindSelectedPageTitle(15) ?></h4>
                        <p><?php echo FindSelectedContent(15, 100);?></p>
                        <a title="Use your personal cabinet." href="http://codifydesign.com">Learn more</a>
                </div>
            </aside>
            <aside>
                    <div class="content">
                        <img alt="Your account" src="img/photo_lighting.jpg"/>
                      <h4><?php echo FindSelectedPageTitle(16) ?></h4>
                        <p><?php echo FindSelectedContent(16, 100);?></p>
                        <a title="Learn how to Whatch your learning statistics." href="http://codifydesign.com">Learn more</a>
                    </div>
            </aside>
            <blockquote>
                <p class="quote">Lorem ipsum dolor sit amet conse ctetuer adipiscing elit. Morbi comod sed dolor sit amet consect adipiscing elit.</p>
            <p class="credit"><strong>Author Name</strong><br><em> Business Title</em><br> Company</p>
            </blockquote>
        </section>

         <section class = "inside" id="inside-course">
            <article>
                <h2>What's inside the course</h2>
                 <p><?php 
                    $current_page = FindPageById(17);
                    echo  $current_page["content"];
                 ?></p> 
                <img alt="Your account" src="img/photo_lighting.jpg"/>
                <img alt="Your account" src="img/photo_lighting.jpg"/>
                <img alt="Your account" src="img/photo_lighting.jpg"/>
                
            </article>
        </section>

       <nav>
            <p><?php echo MainNavigation($current_subject, $current_page); ?> </p>
      </nav>


     
    <?php
       include ("../includes/layouts/footer.php");
    ?>