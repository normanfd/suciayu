<?php
    // session start();
    if(!empty($_SESSION)){ 
        header('Location: login.php');
    }else{ 
        session_start(); 
        if($_SESSION != null){
            if($_SESSION['ADMIN']['username'] != null && $_SERVER !=null){
                header('Location: Kasir/index.php');
            }else{
                header('Location: login.php');
            } 
        }
        else{
            header('Location: login.php');
        }
    }
?>