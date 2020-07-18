<?php
include "connection.php";
$jenis_restoran = $_POST['jenis_restoran'];
$makanan = $_POST['makanan'];
$harga = $_POST['harga'];
$nama_lengkap = $_POST['nama_lengkap'];
$no_handphone = $_POST['no_handphone'];
$email = $_POST['email'];

$query = "INSERT INTO makanan(jenis_restoran,makanan,harga,nama_lengkap,no_handphone, email)
 VALUES ('$jenis_restoran','$makanan','$harga','$nama_lengkap','$no_handphone', '$email')";

if (mysqli_query($db, $query)) {
    header('Location: dashboard.php');
} else {
    echo "<h2 align=center>Proses penambahan artikel tidak berhasil</h2>";
    echo $jenis_restoran;
    echo  mysqli_error($db);
}
?>