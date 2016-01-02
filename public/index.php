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
                    <h3><a href="#atmo-anc">How we teach</a></h3>
                     <p><?php $current_page = FindPageById(14);
                    echo $val = substr($current_page["content"], 0, 150) . "...";
                    ?> </p>
                </div>
            </aside>
            
            <aside>
                <div class = "content stratagy">
                    <h3><a href="#inside-course">What's inside the course</a></h3>
                      <p><?php $current_page = FindPageById(17);
                    echo $val = substr($current_page["content"], 0, 150) . "...";
                    ?> </p>
                </div>
            </aside>
            
             <aside>
                <div class = "content tools">
                    <h3><a href="#tools">Find your community</a></h3>
                    <p>Nullam sit amet enim. Lorem ipsum dolor sit amet, consect etuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci rhoncus neque, id pulvinar odio.</p>
                </div>
            </aside>
        </section>

         <section class = "atmosphere" id="atmo-anc">
            <article>
                <h2>Offering the best learning tools</h2>
                <p>Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Lorem ipsum dolor sit amet etuer adipiscing elit.  Pulvinar odio lorem non turpis. Nullam sit amet enim lorem.</p>
                <a class = "btn" title ="Offering the best learning tools" href="#">Learn more</a>
            </article>
        </section>

        <section class = "how-to">
            <aside>
                <div class="content">
                        <img alt="Your account" src="img/photo_seating.jpg"/>
                       <h4>How-To: Use your personel cabinet</h4>
                        <p>Consectetuer adipiscing elit. Morbi commodo ipsum sed gravida orci magna rhoncus pulvinar odio lorem.</p>
                        <a title="Learn how to use your personel cabinet." href="http://codifydesign.com">Learn more</a>
                </div>
            </aside>
            <aside>
                    <div class="content">
                        <img alt="Your account" src="img/photo_lighting.jpg"/>
                        <h4>How-To: Whatch your learning statistics</h4>
                        <p>Morbi commodo, ipsum sed pharetra gravida magna rhoncus neque id pulvinar odio lorem non turpis nullam sit amet.</p>
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
       </section>


     
    <?php
       include ("../includes/layouts/footer.php");
    ?>