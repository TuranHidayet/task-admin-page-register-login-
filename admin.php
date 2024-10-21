<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./assets/css/admin.css">
</head>
<body>
<?php    
include './navbar.php';
session_start();
?>
<div class="container mt-5">
    <h1 class="text-center text-white bg-dark">Admin Panel - Xoş gəldiniz, <?php echo $_SESSION['username']; ?>!</h1>


    <h2 class="text-center text-white bg-dark">Qeydiyyatdan keçən istifadəçilər:</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
           if (!isset($_SESSION['username'])) {
            header('Location: login.php');
            exit();
           }
            $file = 'files/users.csv';

            if (($handle = fopen($file, 'r')) !== FALSE) {
              $handle = fopen($file, 'r');
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    echo "<tr>";
                   
                    foreach ($data as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>";
                }
                fclose($handle);
            } else {
                echo "<tr><td colspan='4'>Faylı oxumaq mümkün olmadı.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="text-center mb-3">
  <a href="logout.php" class="btn btn-danger">Çıxış</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>