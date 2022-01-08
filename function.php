<?php 
session_start();

$koneksi = mysqli_connect("localhost","root","","inventory");

// login
if(isset($_POST['login'])){
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $cekuser = mysqli_query($koneksi, "select * from akses where username='$username' and password='$password'");
    $hitung = mysqli_num_rows($cekuser);
    
    if($hitung>0){
        $ambildatarole = mysqli_fetch_array($cekuser);
        $role = $ambildatarole['role'];
        

        if($role=='admin'){
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'Admin';
            $_SESSION['uname'] = $username;
            $_SESSION['role'] = $role;
            header('location:./admin');

        }else{
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'User';
            $_SESSION['uname'] = $username;
            $_SESSION['role'] = $role;
            header('location:./user');
        }

    } else{
        echo 'data tidak ada';
    }


}

?>