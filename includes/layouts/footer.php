    <?php if (!isset($context)) {
    	$context = "public"; 
    }?>
    <footer>
               &copy; JCLASS <?php echo date("Y");?>
                    <div class="content" id="footer-anc">
                    <a title="Privacy Policy" href="#">Privacy Policy</a>
                    <a title="terms of Service" href="#">Terms of Use</a>
                    <?php if ($context == "public") {
                    echo "<a title=\"terms of Service\" href=\"admin.php\">Admin</a>";
                    }
                    ?>
                    </div>
  </footer>

          </div>

</body>
</html>
<?php 
if (isset($db)) {
	mysqli_close($db);
}

?>