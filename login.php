<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
<?php    
include './navbar.php';
session_start();
?>

<div class="container loginPg">
  <form class="login-center" method="POST" action="login.php">
    <div class=" mb-4 row">
    <label for="username"  class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-5">
      <input type="text" name="username" class="form-control" id="inputPassword">
    </div>
    </div>

  <div class="mb-4 row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-5">
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
    </div>

    <div class="col-12 ">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>

  </form>
</div>

<?php
if (isset($_SESSION['username'])) {
  header('Location: admin.php');
  exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];


  $file = 'files/users.csv';

  // $handle = fopen($file, 'a');

  if($handle = fopen($file, 'r') !== FALSE){
    $handle = fopen($file, 'r');

    $found = false;

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      var_dump($data[0]);
      if ($data[0] == $username && $data[3] == $password) {
          
          $found = true;
          break;
      }
  }

    fclose($handle);

    if($found){
      echo "Giriş uğurlu oldu. Xoş gəldiniz," . htmlspecialchars($username) . "!";
      $_SESSION['username'] = $username;
      header ('Location: admin.php');
      exit(); 

    }else{
      echo "<alert>(İstifadəçi adı ve ya Parol xətalıdır!);</alert>";
    } 
  }else {
    echo "<alert>(Faylı oxumaq mümkün olmadı!);</alert>";
  }
}



?>

</body>
</html>