<?php
    require 'panggil.php';

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah'))
    {
        $nama = strip_tags($_POST['nama']);
        $telepon = strip_tags($_POST['telepon']);
        $email = strip_tags($_POST['email']);
        $alamat = strip_tags($_POST['alamat']);
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        
        $tabel = 'tbl_user';
        # proses insert
        $data[] = array(
            'username'		=>$user,
            'password'		=>md5($pass),
            'nama_pengguna'	=>$nama,
            'telepon'		=>$telepon,
            'email'			=>$email,
            'alamat'		=>$alamat
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';
    }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama']);
		$telepon = strip_tags($_POST['telepon']);
		$email = strip_tags($_POST['email']);
		$alamat = strip_tags($_POST['alamat']);
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);
		
        // jika password tidak diisi
        if($pass == '')
        {
            $data = array(
                'username'		=>$user,
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }else{

            $data = array(
                'username'		=>$user,
                'password'		=>md5($pass),
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
    }
    
    // hapus data
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
    }

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        $result = $proses->proses_login($user,$pass);
        if($result == 'gagal')
        {
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan 
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan 
            echo "<script>window.location='../Kasir/index.php';</script>";
        }
    }


    // proses tambah kasir
    if(!empty($_GET['aksi'] == 'tambah_kasir'))
    {
    
        $NIK = strip_tags($_POST['NIK']);
        $Nama = strip_tags($_POST['Nama']);
        $Jenkel = strip_tags($_POST['Jenkel']);
        $Tempat_lahir = strip_tags($_POST['Tempat_lahir']);
        $Tanggal_lahir = strip_tags($_POST['Tanggal_lahir']);
        $Alamat= strip_tags($_POST['Alamat']);
    
        
        $tabel = 'tblkasir';
        # proses insert
        $data[] = array(
            'NIK'         => $NIK,
            'Nama'           => $Nama,
            'Jenkel'       => $Jenkel,
            'Tempat_lahir'  => $Tempat_lahir,
            'Tanggal_lahir'  => $Tanggal_lahir,
            'Alamat'  => $Alamat
           
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../Kasir/index.php"</script>';
    }

    // hapus data Kasir
    if(!empty($_GET['aksi'] == 'hapus_kasir'))
    {
        $tabel = 'tblkasir';
        $where = 'NIK';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../kasir/index.php"</script>';
    }

    // proses edit Kasir
	if(!empty($_GET['aksi'] == 'edit_kasir'))
	{
		$NIK = strip_tags($_POST['NIK']);
        $Nama = strip_tags($_POST['Nama']);
        $Jenkel = strip_tags($_POST['Jenkel']);
        $Tempat_lahir = strip_tags($_POST['Tempat_lahir']);
        $Tanggal_lahir = strip_tags($_POST['Tanggal_lahir']);
        $Alamat= strip_tags($_POST['Alamat']);
    

        $data = array(
            'NIK'         => $NIK,
            'Nama'           => $Nama,
            'Jenkel'       => $Jenkel,
            'Tempat_lahir'  => $Tempat_lahir,
            'Tanggal_lahir'  => $Tanggal_lahir,
            'Alamat'        => $Alamat
            
        );

        $tabel = 'tblKasir';
        $where = 'NIK';
        $id = strip_tags($_POST['NIK']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../Kasir/index.php"</script>';
    }
?>
