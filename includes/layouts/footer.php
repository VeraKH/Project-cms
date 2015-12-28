    <footer>
               &copy; JCLASS <?php echo date("Y");?>
                    <div class="content" id="footer-anc">
                    <a title="Privacy Policy" href="#">Privacy Policy</a>
                    <a title="terms of Service" href="#">Terms of Use</a>
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