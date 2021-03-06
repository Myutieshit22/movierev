<!DOCTYPE html>
<html class="h-100">

<?php include_once 'head.php'; ?>

<body class="h-100">
<?php 
    include_once 'functions/functions.php';
    
    if(isset($_SESSION['nama'])){
        header("Location: index.php");
    }
    
    if(isset($_POST['action'])){
        if($_POST['action'] == 'Register' && isset($_POST['email']) && isset($_POST['nama']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            //kalo daftar
            if(strlen($password) < 8){
                //kalo password kurang dari 8 huruf
                throwError('Password Must Be More Than 8 Letter!');
            }else{
                $CariEmailSama = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='$email'");
                if(mysqli_num_rows($CariEmailSama) == 0){
                    //Semua sudah lewat, tinggal masukin db
                    $MasukinDb = mysqli_query($conn, "INSERT INTO users (user_username, user_email, user_password) VALUES ('$name','$email','$password')");
                    if($MasukinDb){
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $name;
                        header("Location: index.php");
                    }else{
                        throwError("There's Something Wrong!");
                    }
                }else{
                    throwError('Email Has Been Registered!');
                }
            }
        
        }else{
            $email = $_POST['email'];
            $password = $_POST['password'];
            $Cari = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email='$email' AND user_password='$password'");
            if(mysqli_num_rows($Cari) > 0){
                $_SESSION['email'] = $email;
                $CariNama = mysqli_query($conn, "SELECT user_username FROM users WHERE user_email='$email'");
                while($row = mysqli_fetch_row($CariNama)){
                    $_SESSION['name'] = $row[0];
                }
                header("Location: index.php");
            }else{
                throwError("Email/Incorrect");
            }
        }
    }
?>
    <?php include_once 'navbar.php'; ?>
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-sm mr-3 ml-3 mt-4">
                <h1>Login</h1>
                <form method="POST">
                    <input type="hidden" name="action" value="login">
                    <div class="form-group">
                        <label name="email">Email</label>
                        <input name="email" autocomplete="username email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" autocomplete="new-password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="col-sm mr-3 ml-3 mt-4">
                <h1>Register</h1>
                <form method="POST">
                    <input type="hidden" name="action" value="Register">
                    <div class="form-group">
                        <label name="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>