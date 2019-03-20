<!DOCTYPE html>
<html lang="en">

<?php
include "view/head.php";
?>


  <body>
      <!--CONTENT -->

	  <div id="login-page">
	  	<div class="container">
	  		
	  	
    		  <form class="form-login" method="post" action="proseslogin.php">
		        <h2 class="form-login-heading"> <span class="glyphicon glyphicon-lock"></span>LOGIN PAGE</h2>
                <center><h5> <span class="glyphicon glyphicon-qrcode"></span> DOT Indonesia <span class="glyphicon glyphicon-qrcode"></span></h5></center>
		        <div class="login-wrap">
		            <input name="nik" id="nik" type="input" class="form-control" autocomplete="off" placeholder="NIK" required  autofocus>
                    <br />
                    <input name="password" id="password" type="password" class="form-control" autocomplete="off" placeholder="Password" required autofocus="">
                    <br />
                    <button class="btn btn-lg btn-info btn-block" type="submit">LOGIN</button>
		           
          	  	
                         <hr>

                         
		            <!-- <div class="login-social-link centered">
		            <p>atau login sebagai </p>
		                <a href="login.html" class="btn btn-success" type="submit"><i class="fa fa-user"></i> Siswa</a>
		                <a href="login-guru.php" class="btn btn-warning" type="submit"><i class="fa fa-user"></i> Guru</a>
		            </div> -->



		            <div class="registration">
		                <a class="" href="#">
		                    DOT Indonesia
		                </a>
		            </div>
		
		        </div>
		

		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>


    <!--Background-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <!--Background-->
   <!--  <script>
        $.backstretch("foto/2.jpg", {speed: 500});
    </script> -->


  </body>
</html>
