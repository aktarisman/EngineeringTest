<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:login.php');	
} else {
	include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
<?php include "view/head.php"; ?>
  <body>

  <section id="container" >

      
   <?php include "view/header.php"; ?>
 
      <aside>
          <div id="sidebar"  class="nav-collapse ">



              <!-- sidebar-->


              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <h5 class="centered"></h5>


<?php
echo"<center>";
              echo $_SESSION['username'];echo"</br>";
              echo $_SESSION['akses'];
echo"</center>";
               ?></h5>
              	  	<?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "login.php"; // Set logout URL

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




                  <?php include "view/sidebar.php"; ?>

              </ul>
             
          </div>
      </aside>
      <!--sidebar-->


      
      <!-- CONTENT-->


      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                   
                    <div class="row mtbox">

 <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i>Data</h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">

                        <?php $tampil=mysqli_query($koneksi,"SELECT * from kandidat");
                        $total=mysqli_num_rows($tampil);
                    ?>


                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                                <h3><a href="http://localhost/DOTIndonesia/kandidat/" class="btn btn-lg btn-warning">Kandidat</a></h3>
                  <span class="glyphicon glyphicon-user"></span>
                  <h3><?php echo "$total"; ?></h3>
                        </div>
                  <p>DOT Indonesia memiliki <?php echo "$total"; ?> Kandidat</p>
                      </div>


<?php $tampil=mysqli_query($koneksi,"SELECT * from lowongan");
                        $total=mysqli_num_rows($tampil);
                    ?>
                <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                                <h3><a href="http://localhost/DOTIndonesia/lowongan/" class="btn btn-lg btn-warning">Kandidat</a></h3>
                  <span class="glyphicon glyphicon-file"></span>
                  <h3><?php echo "$total"; ?></h3>
                        </div>
                  <p>DOT Indonesia memiliki <?php echo "$total"; ?> Lowongan</p>
                      </div>



      </div>
        </div>
            </div>
            </div>

  </div>
             </div>
                 </div>







                    <div class="row">


          <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i>Kandidat Baru</h3> 
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">

                   <?php
                    $tampil=mysqli_query($koneksi,"SELECT kandidat.id,
                                    kandidat.nama,
                                    kandidat.jkelamin,
                                    kandidat.nohp,
                                    kandidat.email,
                                    lowongan.nama_lowongan,
                                    kandidat.file,
                                    kandidat.status,
                                    kandidat.tanggal_apply FROM kandidat inner join lowongan on kandidat.id_lowongan=lowongan.id 
                                    order by id desc limit 1");
                    ?>

                  <table class="table table-bordered table-hover table-striped tablesorter">
                  
                      <tr>
                        <th>Nama<i class=""></i></th>
                        <th>Jenis Kelamin<i class=""></i></th>
                        <th>Alamat<i class=""></i></th>
                        <th>No Hp<i class=""></i></th>
                        <th>Email<i class=""></i></th>
                        <th>Lowongan Yang Dipilih<i class=""></i></th>
                        <th>File CV/Portfolio<i class=""></i></th>
                        <th>Tanggal Apply<i class=""></i></th>
                      </tr>

                     <?php while($data=mysqli_fetch_array($tampil))
                    { ?>

                    <tr>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jkelamin'];?></td>
                    <td><?php echo $data['nohp'];?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['nama_lowongan'];?></td>
                    <td><center><a href="file/<?php echo $data['file'];?>"><?php echo $data['file'];?></a></center></td>
                    <td><?php echo $data['status'];?></td>
                    <td><?php echo $data['tanggal_apply'];?></td>

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

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>



    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	

	
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
