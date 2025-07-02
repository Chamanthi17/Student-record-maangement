<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "studentrecord";
$con = mysqli_connect($server, $user, $password, $db);
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Forgot password</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        
        .banner {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(college.jpeg);
            background-size: cover;
            background-position: center;
        }
        
        .regform {
            width: 500px;
            background-color: rgb(171, 188, 214);
            color: #fff;
            margin: auto;
            padding: 10px 0px 5px 0px;
            text-align: center;
            border-radius: 15px 15px 0px 0px;
        }
        
        .nane {
            background-color: whitesmoke;
            width: 500px;
            margin: auto;
            border-radius: 0px 0px 5px 15px;
        }
        
        form {
            padding: 5px;
        }
        
        form .name {
            width: 100%;
            height: 30px;
        }
        
        .name {
            margin-left: 15px;
            margin-top: 10px;
            width: 10px;
            height: 40px;
            color: black;
            font-size: 16px;
            font-weight: 700;

        }
        .pw {
            position: relative;
            left: 200px;
            top: -30px;
            line-height: 30px;
            width: 150px;
            border-radius: 8px;
            padding: 0 2px;
            font-size: 14px;
            color: black;
        }
        button {
            background-color: aquamarine;
            display: block;
            margin: -5px 0px 10px 20px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #366473;
            padding: 10px 50px;
            outline: none;
            color: black;
            font-size: 16px;
            cursor: pointer;
            transition: 0.25px;
        }
        button:hover {
            background-color: rgb(171, 188, 214);
        }
    </style>
</head>
<body>

<?php
if (isset($_POST['submit'])) {
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    if ($password === $cpassword) {
        $e = $_SESSION['mail'];

        $updatequery = "update register set password='$pass' where mailid='$e'";
        $iquery = mysqli_query($con, $updatequery);
        if ($iquery) {
?>
                <script>
                alert("Password updated Successfully");
                location.replace("home.php");
                </script>
                <?php
        }
        else {
?>
                <script>
                alert("Not updated");
                </script>
                <?php
        }

    }
    else {
?>
            <script>
            alert("password  are not matching");
            </script>
            <?php
    }


}
?>







<div class="banner">
        <br><br><br><br><br><br>
        <div class="regform">
            <h2>Change Password</h2>
        </div>
        <div class="nane">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <h4 class="name">New Password</h4>
                <input class="pw" type="Password" name="password" required="">
                <h4 class="name">Confirm Password</h4>
                <input class="pw" type="Password" name="cpassword" required="">
                <button type="submit" name="submit"> Confirm</button>
            </form>
        </div>
</body>

</html>