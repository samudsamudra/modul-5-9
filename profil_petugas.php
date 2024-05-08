<?php 
session_start();

if(!isset($_SESSION['username'])) {
    header('location: tampil_petugas.php');
    exit();
}


$username = $_SESSION['username'];
$level = $_SESSION['level'];


$levelDesc = '';
switch($level) {
    case 1:
        $levelDesc = 'Entitas Lain';
        break;
    case 2:
        $levelDesc = 'Petugas';
        break;
    case 3:
        $levelDesc = 'Pengelola';
        break;
    default:
        $levelDesc = 'Joki Pop Ice';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profil Petugas</h5>
                        <p class="card-text"><strong>Username:</strong> <?php echo $username; ?></p>
                        <p class="card-text"><strong>Level:</strong> <?php echo $levelDesc; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
