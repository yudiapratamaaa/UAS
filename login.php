<?php 
session_start();

if (!isset($_SESSION['login'])) {
  // header('Location: index.php');
} else {
  header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covid</title>

    <!-- menyisipkan bootstrap -->
     <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
     <link rel="stylesheet" href="styles.css" />
     <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="body-login">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h3 class="text-center red-aja">Relawan Covid 19</h3>
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="check_login.php" method="post">
              <div class="form-label-group">
                <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <?php 
		if(@$_SESSION['msg']==1){
			echo '<div class="alert alert-info" role="alert">Maaf Username atau Password yang kamu masukkan salah.</div>';
			$_SESSION['msg'] = 0;
		}
		?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>