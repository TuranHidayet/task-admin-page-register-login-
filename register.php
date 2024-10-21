<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/register.css">
</head>
<body>
<?php
include 'navbar.php';

?>
<div class="container content-register">
<form class="row g-3" method="POST" action="register.php">
    <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="inputCity">
    </div>
    <div class="col-md-6">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" name="surname" class="form-control" id="inputCity">
    </div>
    <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="inputCity">
    </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4">
  </div>
 
  <div class="col-12">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Baku, Azerbaycan">
  </div>

  <div class="col-md-4">
    <label for="phone" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control" id="inputZip">
  </div>

  <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword4">
  </div>

  <div class="col-12 ">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>

<?php

session_start();

if (isset($_SESSION['username'])) {
  header('Location: admin.php');
  exit();
}

  if($_SERVER["REQUEST_METHOD"]=="POST"){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $file = 'files/users.csv';

  $handle = fopen($file, "a");

  

  if(filesize($file)==0){
    fputcsv($handle, ['username', 'email', 'phone', 'password']);
  }
  
  fputcsv($handle, [$username, $email, $phone, $password]);

  fclose($handle);

  header('Location: login.php');
  exit();
}

?>

</div>
</body>
</html>

