<?php
include "connection.php";
$id = $_POST['id'];
$jenis_restoran =  $_POST['jenis_restoran'];
$makanan;
if(isset($_POST['makanan'])) {
    $makanan = $_POST['makanan'];
} else {
    $makanan = $_POST['makanan_temp'];
}
$harga;
if(isset($_POST['harga'])) {
    $harga = $_POST['harga'];
} else {
    $harga = $_POST['harga_temp'];
}
$nama_lengkap = $_POST['nama_lengkap'];
$no_handphone = $_POST['no_handphone'];
$email = $_POST['email'];
$update="UPDATE makanan SET jenis_restoran='$jenis_restoran', makanan='$makanan',
harga='$harga',
nama_lengkap='$nama_lengkap', no_handphone='$no_handphone', email='$email' WHERE id ='$id'";
if (mysqli_query($db, $update)) {
    header('Location: dashboard.php');
} else {
 echo "relawan gagal di update";
}
?>