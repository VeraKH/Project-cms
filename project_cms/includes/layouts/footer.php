    <?php if (!isset($context)) {
    	$context = "public"; 
    }?>
    <footer>
               &copy; JCLASS <?php echo date("Y");?>
                    <div class="content" id="footer-anc">
                    <a title="Privacy Policy" href="#">Privacy Policy</a>
                    <a title="terms of Service" href="#">Terms of Use</a>

                        <script type="text/javascript">
                             $("#inside-img").click(function() {
                             $("#inside-img").animate({width: 400}, 300)
                               .animate({height: 300}, 400)
                               .animate({left: 200}, 500)
                               .animate({top: "+=100", borderWidth: 10}, "slow")});
                        </script>
                    
                    <?php if ($context == "public") {
                    echo "<a title=\"terms of Service\" href=\"admin.php\">Admin</a>";
                    }
                    ?>
                   
                    </div>
  </footer>

          </div>
<script type="text/javascript" src="js/myscripts.js"></script>
</body>
</html>
<?php 
if (isset($db)) {
	mysqli_close($db);
}

?>