<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cari Alumni | SI Himpunan Alumni Amanatul Ummah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
	<link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      /* Sticky footer styles
      -------------------------------------------------- */
      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
		background: url(../../assets/img/bg.jpg) no-repeat;
		background-size: 300% 300%;
		background-position: center top;
      }
      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }
		
      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      .logo{
		width : 290px;
		height : 290px;
	  }
      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }
      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */
      #wrap > .container {
        padding-top: 60px;
      }
      .container .credit {
        margin: 20px 0;
      }
      code {
        font-size: 80%;
      }
	  
	  
    </style>
    <link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">
	
	    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap-transition.js"></script>
    <script src="../../assets/js/bootstrap-alert.js"></script>
    <script src="../../assets/js/bootstrap-modal.js"></script>
    <script src="../../assets/js/bootstrap-dropdown.js"></script>
    <script src="../../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../../assets/js/bootstrap-tab.js"></script>
    <script src="../../assets/js/bootstrap-tooltip.js"></script>
    <script src="../../assets/js/bootstrap-popover.js"></script>
    <script src="../../assets/js/bootstrap-button.js"></script>
    <script src="../../assets/js/bootstrap-collapse.js"></script>
    <script src="../../assets/js/bootstrap-carousel.js"></script>
    <script src="../../assets/js/bootstrap-typeahead.js"></script>
	
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../../assets/ico/favicon-himah.jpg">
  </head>

  <body>


    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="../home"> <img src="../../assets/img/logo-himah.png" width="25px" height="25px"/> SI-HIMAH</a>
            <div class="nav-collapse  navbar-responsive-collapse collapse">
              <ul class="nav">
                <li> <a href="../home"><i class="icon-home"></i> Beranda</a></li>
                
                <li><a href="../pilihadmin/tentang"> <i class="icon-bookmark"> </i> Tentang</a></li>
              </ul>
			</div>
				
			<div class="nav-collapse collapse">
			<ul class="nav pull-right">
				
				<li>
					<div class="btn-group">
					<a href="#" class="btn btn-primary"><i class="icon-user icon-white"></i><?php echo $NamaLengkap . " "; ?>(sebagai admin)</a>
					<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="../pilihadmin/ubahdataadmin"><i class="icon-pencil"></i> Mengubah Data Admin</a></li>
						<li><a href="../pilihadmin/tambahakun"><i class="icon-pencil"></i> Menambah Akun</a></li>
						<li><a href="../pilihadmin/ubahdataalumni"><i class="icon-pencil"></i> Mengubah Data Alumni</a></li>
							
						<li class="divider"></li>
						<li class="nav-header">Pengaturan</li>
						
						<li><a href="../pilihadmin/ubahdataadmin"><i class="icon-lock"></i> Mengubah Password</a></li>
						
						<li class="divider"></li>
						<li class="nav-header">Akun</li>
						
						<li><a href="../home/sign_out"><i class="icon-off"></i> Keluar</a></li>
					</ul>
					</div>
				</li>
			
			  </ul>
				
			</div><!--/.nav-collapse -->
		  
		  
        </div>
      </div>
	 </div>

      <!-- Begin page content -->
      <div class="container">
	  <center><h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Mencari Data Alumni</h2> <br> </center> 
        <div class="row-fluid">
		
				<div class="span4"> </div>
				
				<div class="span4">
				
				<form class="form-horizontal" method="post" action="ubahdataalumni">
					
					<!--Cari Nama-->
					<div class="control-group">
						<label class="control-label" for="inputNama" style="text-align: left"> Nama</label>
							<div class="controls">
								<input class="input-xlarge" type="text" id="inputNama" name="inputNama" placeholder="Nama">
							</div>
					</div>
					
					<!--Cari Lembaga-->
					<div class="control-group">
					<label class="control-label" for="inputLembaga" style="text-align: left"> Lembaga</label>
							<div class="controls">
								<select class="input-xlarge" id="inputLembaga" name="inputLembaga">
										<option>-</option>
										<option>MA Unggulan Amanatul Ummah Surabaya	</option>
										<option>MA Akselerasi Amanatul Ummah Surabaya</option>
										<option>SMA Unggulan Amanatul Ummah Surabaya</option>
										<option>MBI Amanatul Ummah Surabaya</option>
										<option>MA Akselerasi Amanatul Ummah Pacet</option>
										<option>MBI Amanatul Ummah Pacet</option>
										<option>SMA Berbasis Pesantren Amanatul Ummah Pacet</option>
										<option>SMA Bendungan Jati Hikmatul Amanah Pacet</option>
										
								</select>
							</div>
					</div>
					
					<!--Cari Cabang-->
					<div class="control-group">
					<label class="control-label" for="inputCabang" style="text-align: left"> Cabang PTN/PTS</label>
							<div class="controls">
								<select class="input-xlarge" id="inputCabang" name="inputCabang">
										<option>-</option>
										<option>Surabaya</option>
										<option>Sidoarjo</option>
										<option>Mojokerto</option>
										<option>Malang</option>
										<option>Jember</option>
										<option>Madura</option>
										<option>Yogyakarta</option>
										<option>Semarang</option>
										<option>Solo</option>
										<option>Jakarta</option>
										<option>Bogor</option>
										<option>Bandung</option>
										<option>Indramayu</option>	
								</select>
							</div>
					</div>
				
				<br>
				  <div class="control-group">
					<div class="controls">
					  <button type="submit" class="btn btn-large btn-primary">Cari</button>
					</div>
				  </div>
				 
				</form>
				
				</div>
				
				<div class="span4"> </div>
				
			</div>
			
			<!--Hasil Pencarian-->
			<div class="well" style="max-width: 600px; margin: 0 auto 10px;">
            <div class="caption">
                <?php 
					if($status == 0)
						echo "<h3>Silakan masukkan pencarian</h3>";
					else if($status == 1)
						echo "<h3>Hasil pencarian</h3>";
					else if($status == 2)
						echo "<h3>Data tidak ditemukan</h3>";
				?>
				
                <table class="table table-striped table-condensed">
					<div class="pull-right">
					
					<!--Modal-->
					<!-- Button to trigger modal -->
						<!--<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>-->
						 

					
					</div>
					<?php if($status == 1) {$counter = 0; foreach($query->result() as $row): 
						$counter++;
						echo '
						<!-- Modal -->
						<div id="myModal' . $row->Username . '" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							
								<h3 id="myModalLabel">Apakah anda yakin ingin menghapus akun ?</h3>
						
						  </div>
						  <div class="modal-footer">
							<a href="../pilihadmin/hapusdataalumni/' . $row->Username . '"><button class="btn btn-primary">Ya</button></a>
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						  </div>
						</div>
						
						<script>
							$("#myModal").modal(options)
						</script>';
						echo '
						<tr>
							<td>
							</td>
							<td style= "width: 100px;">
								<a  href="../pilihadmin/gantidataalumni/' . $row->Username . '"> <span class="label label-inverse"><i class="icon-edit icon-white"></i> Ubah Data</span></a>
							</td>
							<td style= "width: 100px;">
								<a  href="#myModal' . $row->Username . '" class="label label-important" data-toggle="modal"><i class="icon-trash icon-white"></i> Hapus Data</a>
							</td>
						</tr>';
						echo '
						<tr>
							<td style="font-size:14px; vertical-align:left; width: 5px;" rowspan="8">'.$counter.'</td>
							<td style= "width: 100px;" rowspan="8">
								<center>
									<img src="../../assets/img/default-foto.png" width="200px" height="200px">
								</center>
							</td>
						</tr>
                        <tr>
							<td style="font-size:14px;" colspan="2"><strong>Nama : '. $row->NamaLengkap .'</strong> 
								<!-- <a href="pesan.php"><i class="icon-envelope"></i></a> -->
							</td>
						</tr>
						<tr>
                            <td style="font-size:12px;" colspan="2">Lembaga : '. $row->Lembaga .'
							</td>
                        </tr>
						<tr>
                            <td style="font-size:12px;" colspan="2">Cabang PTN/PTS : '. $row->Cabang .'
							</td>
                        </tr>
						<tr>
                            <td style="font-size:12px;" colspan="2">Alamat : '. $row->AlamatSekarang .'
							</td>
                        </tr>
						<tr>
                            <td style="font-size:12px;" colspan="2">No. HP : '. $row->NoHP .'
							</td>
                        </tr>
						<tr>
                            <td style="font-size:12px;" colspan="2">Email : '. $row->Email .'
							</td>
                        </tr>
			
					
						<tr>
							<td style="width: 70px;">
                                <span>
									<a href="https://www.facebook.com/jabiralhayyan"> <img src="../../assets/img/logo-fb.png" width="30px" height="30px"></a>
								</span> 
                                <span>
									<a href="-"> <img src="../../assets/img/logo-twitter.png" width="30px" height="30px"></a>
								</span>
                                <span>
									<a href="-"> <img src="../../assets/img/logo-blog.png" width="30px" height="30px"></a>
								</span>
                            </td>
						</tr>
						';
						endforeach;} ?>
					</table>
				</div>					
            </div>
        </div>        
			<!--end-->
			
	</div>

    </div>

    <div id="footer">
      <div class="container">
	  <br><br><br>
		<div class="span11">
			<center><h5 style="background-color: #e3e3e3">Copyright &copy; Manajemen Proyek Perangkat Lunak (D) 2015</h5></center>
		</div>
      </div>
    </div>





  </body>
</html>