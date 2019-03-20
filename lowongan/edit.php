<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Sistem Informasi Nilai">
    <meta name="author" content="">
    <meta name="keyword" content="">

    <title>DOT INDONESIA</title>

    <!--bootstrap.css -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--font-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

  
  </head>

  <body>

  <section id="container" >
      <?php include "../view/header.php"; ?>

       <aside>
          <div id="sidebar"  class="nav-collapse ">



              <!-- sidebar-->


              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <h5 class="centered"><?php
              echo $_SESSION['username'];
              echo $_SESSION['akses'];
               ?></h5>
              	  	<?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../login.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>

                  <?php include "../view/sidebar.php"; ?>

              </ul>
             
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>&raquo; Edit Lowongan</h3>
          	
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM lowongan WHERE id='$_GET[id]'");
            $data  = mysqli_fetch_array($query);
            ?>
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Lowongan</h4>
                      <form class="form-horizontal style-form" action="update.php" method="post" name="form1" id="form1">


 						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID</label>
                              <div class="col-sm-6">
                                  <input name="id" type="text" id="id" class="form-control" value="<?php echo $data['id'];?>" autofocus="on" readonly/>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Lowongan</label>
                              <div class="col-sm-6">
                                  <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama_lowongan'];?>" autofocus="on"/>
                              </div>
                          </div>



                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Job Desc</label>
                              <div class="col-sm-6">
                                  <input name="desc" type="text" id="desc" class="form-control" value="<?php echo $data['job_desc'];?>" required />
                      
                              </div>
                              </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Required Skill</label>
                              <div class="col-sm-6">
                                  <input name="skill" type="text" id="skill" class="form-control" value="<?php echo $data['required_skill'];?>" required />
                      
                              </div>
                              </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-6">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>


                     </form>
                  </div>
          		</div>  	
          	</div>
          	
		</section>
      </section>

     
 
  </section>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>



    <script src="../assets/js/common-scripts.js"></script>

    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<script src="../assets/js/bootstrap-switch.js"></script>
	
	<script src="../assets/js/jquery.tagsinput.js"></script>
	
	
	
	<script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="../assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="../assets/js/form-component.js"></script>    
    
    
  <script>
  

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
