<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require '../proses/panggil.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Transaksi Pembelian</title>
		<!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- jQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <!-- DATATABLES BS 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- BOOTSTRAP 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	</head>
    <body style="background:#808080;">
		<div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
            <!-- Navbar content -->
            <a class="navbar-brand" href="#">
                <img src="https://th.bing.com/th/id/R.2c4eae158a7ec4aa2d0b2a6a7ae937ee?rik=RIVDv9PAGXih%2fA&riu=http%3a%2f%2f4.bp.blogspot.com%2f-3fW8ourxVyE%2fUQ5WGYCwWfI%2fAAAAAAAAALQ%2fye04CJIQ1hA%2fs1600%2f386516_451203421603520_501896563_n.jpg&ehk=hYemnJMbSrv5yWEuhn2Q1L4hgUdPT0MQOJ4VqRcohEw%3d&risl=&pid=ImgRaw&r=0" width="30" height="30" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">

                <!-- <span class="navbar-text">
                Navbar text with an inline element
                </span> -->
                <a href="../logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
            </div>
            </nav>
            <div class="card">
                <!-- <div class="card-header">
                    Transaksi Pembelian
                </div> -->
                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-12">
                        <?php if(!empty($_SESSION['ADMIN'])){?>
                        <br/>
                        <span style="color:#000";>Selamat Datang, <b><?php echo $_SESSION['ADMIN']['username'];?></b></span> <br><br>
                        
                        <?php if ( $_SESSION['ADMIN']['role'] == 1): ?>
                            <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
                        <?php endif ?>
                        <br/><br/>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transaksi Pembelian</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Kode_Barang</th>
                                            <th>Nama_Barang</th>
                                            <th>Harga_Jual</th>
                                            <th>Harga_Beli</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Kode_suplier</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no=1;
                                        $hasil = $proses->tampil_master_Suplier();
                                        foreach($hasil as $isi){
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi['Kode_Barang']?></td>
                                            <td><?php echo $isi['Nama_Barangr'];?></td>
                                            <td><?php echo $isi['Harga_Jual'];?></td>
                                            <td><?php echo $isi['Harga_Beli'];?></td>
                                            <td><?php echo $isi['Stok'];?></td>
                                            <td><?php echo $isi['Satuan'];?></td>
                                            <td><?php echo $isi['Kode_suplier'];?></td>
                                                <!-- <?php $jancuy= $_SESSION['ADMIN']['role'] ?> -->
                                                <?php if ( $_SESSION['ADMIN']['role'] == 1): ?>
                                                <td style="text-align: center;">
                                                    <a href="edit.php?id=<?php echo $isi['Kode_Barang'];?>" class="btn btn-success btn-md">
                                                    <span class="fa fa-edit"></span></a>
                                                    <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../proses/crud.php?aksi=hapus_pelanggan&hapusid=<?php echo $isi['pelanggan_id'];?>" 
                                                    class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
                                                </td>
                                            <?php else: ?>
                                                <td>Tidak Terdapat Akses Mengedit</td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php
                                        $no++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php }else{?>
                            <br/>
                            <div class="alert alert-info">
                                <h3> Maaf Anda Belum Dapat Akses CRUD, Silahkan Login Terlebih Dahulu !</h3>
                                <hr/>
                                <p><a href="login.php">Login Disini</a></p>
                            </div>
                        <?php }?>
                    </div>
                </div>
                </div>
            </div>
		</div>
        <script>
            $('#mytable').dataTable();
        </script>
	</body>
</html>