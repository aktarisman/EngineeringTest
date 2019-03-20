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
<!--           	<h2><i class="fa fa-angle-right"></i> ECR &raquo; Data ECR</h2> -->
            
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Lowongan </h3> 
                        </div>

                        <div class="panel-body">
<div class="col-lg-4">
  <form action='index.php' method="POST">


  <a href="add.php" class="btn btn-sm btn-warning">Tambah Data <i class="fa fa-arrow-circle-right"></i></a><br /><br />
                        <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari Part' required />
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" />
           <a href='index.php' class="btn btn-sm btn-success" >Refresh</i></a>
         </div></form>


                        
                        
                        <div class="table-responsive">
                    
     <?php
                    $query1="SELECT kandidat.id,
                                    kandidat.nama,
                                    kandidat.jkelamin,
                                    kandidat.nohp,
                                    kandidat.email,
                                    lowongan.nama_lowongan,
                                    kandidat.file,
                                    kandidat.status,
                                    kandidat.tanggal_apply FROM kandidat inner join lowongan on kandidat.id_lowongan=lowongan.id";

                    
                    
                    if(isset($_POST['qcari'])){

                      $qcari=$_POST['qcari'];



                 $query1 = "SELECT kandidat.id,
                                    kandidat.nama,
                                    kandidat.jkelamin,
                                    kandidat.nohp,
                                    kandidat.email,
                                    lowongan.nama_lowongan,
                                    kandidat.file,
                                    kandidat.status,
                                    kandidat.tanggal_apply FROM kandidat inner join lowongan on kandidat.id_lowongan=lowongan.id    
                                    where kandidat.nama          like '%$qcari%' or 
                                          kandidat.jkelamin      like '%$qcari%' or 
                                          kandidat.nohp          like '%$qcari%' or
                                          kandidat.email         like '%$qcari%' or 
                                          lowongan.nama_lowongan like '%$qcari%' or
                                          kandidat.file          like '%$qcari%' or 
                                          kandidat.status        like '%$qcari%' or
                                          kandidat.tanggal_apply like '%$qcari%'";
                    }
                    $tampil=mysqli_query($koneksi,$query1) or die(mysqli_error());
                    ?>

                  </br></br>
                  <table class="table table-bordered table-hover table-striped tablesorter">
                  
                      <tr>

                        <th><center>Nama Kandidat</center></th>
                        <th><center>Jenis Kelamin</center></th>
                        <th><center>Nomor HP</center></th>
                        <th><center>Email</center></th>
                        <th><center>Nama Lowongan</center></th>
                        <th><center>File</center></th>
                        <th><center>Status</center></th>
                        <th><center>Tanggal Apply</center></th>
                        <th><center>Action</center></th>
                        
                      </tr>
                     <?php while($data=mysqli_fetch_array($tampil))
                    { ?>
                      <tbody>
                    <tr>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jkelamin'];?></td>
                    <td><?php echo $data['nohp'];?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['nama_lowongan'];?></td>
                    <td><center><a href="file/<?php echo $data['file'];?>"><?php echo $data['file'];?></a></center></td>
                    <td><?php echo $data['status'];?></td>
                    <td><?php echo $data['tanggal_apply'];?></td>

                    <td>
                    	<center>
                    		<a class="btn btn-sm btn-primary tooltips" data-placement="bottom" data-original-title="Edit" href="edit.php?id=<?php echo $data['id'];?>">
                    			<span class="glyphicon glyphicon-edit"></span>
                    		</a>

                        	<a class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-original-title="Delete" onclick="return confirm('Anda yakin akan menghapus Data Dokumen <?php echo $data['id'];?>')" href="delete.php?id=<?php echo $data['id'];?>">
                        		<span class="glyphicon glyphicon-trash">

                        	</a>
                        </center>
                     </td>
                     </tr>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
  </div> 
              </div> 

              </div>
            </div>
          	</div>
                	
		</section>
      </section>
    </section>


     
      <!-- <?php include "footer.php"; ?> -->

  
    <script src="../datatables/jQuery-2.1.4.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    
    <script src="../assets/js/common-scripts.js"></script>

   
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	
	<script src="../assets/js/bootstrap-switch.js"></script>
	

	<script src="../assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
    <script src="../datatables/jquery.dataTables.min.js"></script>
    <script src="../datatables/dataTables.bootstrap.min.js"></script>
	
	<script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="../assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="../assets/js/form-component.js"></script>   
    



  
<script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-data.php",
						type: "post",
            
						error: function(){
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>


  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>




  </body>
</html>
