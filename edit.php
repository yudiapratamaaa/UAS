<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
     <link rel="stylesheet" href="assets/css/styles.css" />
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<?php
include "connection.php";
include "header.php";
?>
<?php
$id_pesanan = $_GET['id_pesanan'];

$query="SELECT * FROM makanan WHERE id =\"$id_pesanan\"";
$result=mysqli_query($db,$query);
$rowGet= $result -> fetch_array(MYSQLI_ASSOC);
?>
<div class="container">
<h1>Form Pesanan</h1>
<div class="form-group">
    <form method="post">
      <label for="exampleInputPassword1">Jenis Restoran</label>
      <select name="id_resto" class="form-control" id="exampleFormControlSelect1">
        <option selected>Pilih</option>
        <option value="padang">Padang</option>
        <option value="betawi">Betawi</option>
        <option value="sunda">Sunda</option>
      </select>
      <button class="btn btn-danger mt-3" type="submit">submit</button>
      <p class="text-danger">Pilih Kembali pesanan kamu ya !</p>
    </form>
  </div>
    <?php
      include 'connection.php';
      $id_resto = isset($_POST['id_resto']) ? $_POST['id_resto'] : "";
      $query = "SELECT * from jenis_makanan where jenis_rumah_makan ='$id_resto'";
      $res = mysqli_query($db, $query);
      $row = mysqli_fetch_array($res);
      $nama_hidangan = $row['nama_hidangan'];
      $harga_hidangan = $row['harga_hidangan'];
  ?>

    <form action="update_relawan.php" method="POST" class="form-group">
    <input type="hidden" name="id" value="<?php echo " $rowGet[id]" ?>">
    <input name="makanan_temp" type="text" value="<?php echo " $rowGet[makanan]" ?>" placeholder="makanan" hidden>
    <input name="harga_temp" type="text" value="<?php echo " $rowGet[harga]" ?>" placeholder="makanan" hidden>

    <input name="jenis_restoran" type="text" value="<?php echo "$id_resto"?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" hidden>
        <div class="form-group">
        <label for="exampleInputEmail1">Nama Hidangan</label>
        <input name="makanan" type="text" value="<?php echo $nama_hidangan;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama pesanan" >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga Hidangan</label>
        <input name="harga" value="<?php echo $harga_hidangan;?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Lengkap</label>
        <input name="nama_lengkap" value="<?php echo "$rowGet[nama_lengkap]" ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">No Hp</label>
        <input name="no_handphone" value="<?php echo "$rowGet[no_handphone]" ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="No Hp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input name="email" value="<?php echo "$rowGet[email]" ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="Email">
      </div>
      <button type="submit" class="btn btn-primary">Edit pesanan</button>
    </form>
</div>