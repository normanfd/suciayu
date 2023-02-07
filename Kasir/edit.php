<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require '../proses/panggil.php';
    
    // tampilkan form edit
    $idGet = strip_tags($_GET['id']);
    $hasil = $proses->tampil_data_id('tblKasir','NIK',$idGet);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Pengguna</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
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
						<h4 class="card-title">Edit Pengguna - <?php echo $hasil['nama_pengguna'];?></h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input dengan method post ke proses crud dengan paramater get aksi edit -->
							<form action="../proses/crud.php?aksi=edit_kasir" method="POST">
							<div class="form-group">
									<label>NIK</label>
									<input type="number" value="<?php echo $hasil['NIK'];?>" class="form-control" name="NIK" readonly>
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="text" value="<?php echo $hasil['Nama'];?>" class="form-control" name="Nama">
								</div>
                                <div class="form-group">
									<label>Jenis Kelamin</label>
									<input type="text" value="<?php echo $hasil['Jenkel'];?>" class="form-control" name="Jenkel">
								</div>
                                <div class="form-group">
									<label>Tempat lahir</label>
									<input type="text" value="<?php echo $hasil['Tempat_lahir'];?>" class="form-control" name="Tempat_lahir">
								</div>
                                <div class="form-group">
									<label>Tanggal lahir</label>
									<input number="text" value="<?php echo $hasil['Tanggal_lahir'];?>" class="form-control" name="Tanggal_lahir">
								</div>
                                <div class="form-group">
									<label>Alamat</label>
									<input type="text" value="<?php echo $hasil['Alamat'];?>" class="form-control" name="Alamat">
								</div>
								
								<button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Simpan Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>