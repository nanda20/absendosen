<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax CRUD with Bootstrap modals and Datatables</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap/css/custom-style.css')?>" rel="stylesheet">
    
    </head> 

<body>
<nav id="mainNav" class="navbar navbar-custom navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">				
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toogle Nav</span> Menu <i class="fa fa-bars"></i>
						</button>				
						<a class="navbar-brand page-scroll" href="<?php echo base_url()?>karyawan">ABSENCE</a>
				</div>

				     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a class="page-scroll" href="<?php echo base_url()?>karyawan/data_karyawan">Karyawan</a>
						</li>
						
						<li class="dropdown">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Absen<span class="caret"></span></a>
		                <ul class="dropdown-menu">
		                 <li><a class="page-scroll" href="<?php echo base_url()?>Absen/absen_dosen">Absen Dosen</a></li>
		                  <li><a class="page-scroll" href="<?php echo base_url()?>Absen/absen_admin">Absen Admin</a></li>
		                </ul>
		              </li>						
						 
						<li>
							<a class="page-scroll" href="<?php echo base_url()?>Reporting/get_reporting"">Laporan</a>
						</li>
						<li>
							<a class="page-scroll" href="<?php echo base_url()?>Karyawan/logout">Logout</a>
						</li>
					</ul>

				</div>
			</div>
			<!-- end containter fluid -->
		</nav>