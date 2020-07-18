<?php 
    include 'connection.php';
	session_start();
    if (!isset($_SESSION['login'])){
        header("Location: index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
     <link rel="stylesheet" href="styles.css" />
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<?php
        include 'header.php'
    ?>
<body>
<div>
<div>
        <h3 class="text-center mt-3 mb-3">Data Pemesanan Makanan </h3> <br>
        <?php $tanggal = new DateTime('now', new DateTimezone('Asia/Jakarta')); ?>
                <?php 
                $dueDate = $tanggal->format("d-F-y H:i:s");
                echo "<p class='text-center mb-3'>Per $dueDate</p>" ?> <br>> <br>
         </div>
    <div class="container">
    <div class="text-right mb-3">
         <a href="add_relawan.php" class="btn btn-primary">Tambah Pesanan</a>
         </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Jenis Restoran</th>
            <th scope="col">Makanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">No. HP</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "select * from makanan ORDER by id DESC";
            if ($data = $db->query($query)) {
                while ($row = $data->fetch_assoc()) {
                $id = $row['id'];
                $jenis_restoran = $row['jenis_restoran'];
                $makanan = $row['makanan'];
                $harga = $row['harga'];
                $nama_lengkap = $row['nama_lengkap'];
                $no_handphone = $row['no_handphone'];
                $email = $row['email'];
                echo "<tr>
                <td>$jenis_restoran</td>
                <td>$makanan</td>
                <td>$harga</td>
                <td>$nama_lengkap</td>
                <td>$no_handphone</td>
                <td>$email</td>
                <td><a
                href=\"edit.php?id_pesanan=$id\">Edit</a>
                &nbsp;<a
                href=\"delete.php?id_pesanan=$id\">Hapus</a></td></tr>";
                
             }
              }
           ?>
        </tbody>
            </table>
            <div class="text-left mt-3 mb-3">
         <a href="generate_pdf.php" class="btn btn-primary">Download PDF</a>
         </div>
        </div>
    </div>
</body>
</html>