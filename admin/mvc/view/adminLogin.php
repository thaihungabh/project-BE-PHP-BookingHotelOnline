
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php 
        require('../public/links.php');
        // require('./mvc/public/links.php');
    ?>
    <style>
        .login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="login-form text-center bg-white rounded shadow overflow-hidden">
        <form action="../controller/admin_controller.php" method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" type="text" required class="form-control shadow-none text-center" placeholder="Admin-Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" type="password" required class="form-control shadow-none text-center" placeholder="Password">
                </div>
                <input type="hidden" name="action" value="login">
                <input type="submit" class="btn text-white custom-bg shadow-none" value="LOGIN">
            </div>
        </form>
    </div>

    <?php 
        require('../public/scripts.php');
        // require('./mvc/public/scripts.php');
    ?>
</body>
</html>