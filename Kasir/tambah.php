<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require '../proses/panggil.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tambah Pengguna</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['username'];?></span>
			<div class="float-right">	
				<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a> 
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>		
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Tambah Pengguna</h4>
						</div>
						<div class="card-body">
							<form action="../proses/crud.php?aksi=tambah_kasir" method="POST">
                                <div class="form-group">
									<label>NIK</label>
									<input type="number" value="" class="form-control" name="NIK">
								</div>
                                <div class="form-group">
									<label>Nama</label>
									<input type="text" value="" class="form-control" name="Nama">
								</div>
									<div class="form-group">
									<label>Jenis Kelamin</label>
									<input type="text" value="" class="form-control" name="Jenkel">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" value="" class="form-control" name="Tempat_lahir">
                                </div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" value="" class="form-control" name="Tanggal_lahir">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea class="form-control" rows="4" name="Alamat" type="text"></textarea>  
								</div>
								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-plus"> </i> Tambah Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>