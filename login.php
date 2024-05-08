<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
        }
        .login-box {
            margin-top: 50px;
        }
        .form-control {
            border-color: #dc3545; /* Warna border form */
        }
        .btn-success {
            background-color: #dc3545; /* Warna tombol login */
            border-color: #dc3545; /* Warna border tombol login */
        }
        .btn-success:hover {
            background-color: #c82333; /* Warna saat tombol login dihover */
            border-color: #bd2130; /* Warna border saat tombol login dihover */
        }
    </style>
</head>
<body>
    <div class="row login-box">
        <div class="col-md"></div>
        <div class="col-md rounded bg-light" style="box-shadow: 4px 4px 5px -4px; padding: 10px;">
            <form action="proses_login.php" method="post">
                <h3 align="center">LOGIN ke website skibidi</h3>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="text-center">
                    <input type="submit" name="login" class="btn btn-success" value="LOGIN">
                </div>
            </form>
        </div>
        <div class="col-md"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
