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
    <title>User Registration</title>

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
        
        
        .email {
            position: relative;
            left: 101px;
            top: -30px;
            line-height: 30px;
            width: 300px;
            border-radius: 8px;
            padding: 0 2px;
            font-size: 14px;
            color: black;
        }
        
        
        .roll{
            position: relative;
            left: 101px;
            top: -30px;
            line-height: 30px;
            width: 300px;
            border-radius: 8px;
            padding: 0 2px;
            font-size: 14px;
            color: black;
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
        
        .option {
            position: relative;
            left: 200px;
            top: -37px;
            line-height: 30px;
            width: 150px;
            height: 40px;
            border-radius: 8px;
            padding: 0 2px;
            font-size: 16px;
            color: black;
            outline: none;
            overflow: hidden;
        }
        
        .option option {
            font-size: 14px;
        }
        
        button {
            background-color: aquamarine;
            display: block;
            margin: 5px 0px 10px 30px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #366473;
            padding: 13px 100px;
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
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mailid = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $prof = mysqli_real_escape_string($con, $_POST['role']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailQuery = " select * from register where mailid='$mailid'";
    $query = mysqli_query($con, $emailQuery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount > 0) {
?>
        <script>
        alert("email already exists");
        </script>
        <?php

    }
    else {
        if ($password === $cpassword) {

            $insertquery = "insert into register(name, mailid, password, cpassword, prof) 
            values('$name','$mailid','$pass','$cpass','$prof')";
            $iquery = mysqli_query($con, $insertquery);
            if ($iquery) {
                $_SESSION['mail'] = $mailid;
                $_SESSION['name'] = $name;
                if ($prof == 'Student') {
?>
                <script>
                alert("Connection Success");
                location.replace("stu.php");
                </script>
                <?php
                }
                else {
?>
                <script>
                alert("Connection Success");
                location.replace("teach.php");
                </script>
                <?php

                }
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


}
?>
    <div class="banner">
        <br><br>
        <div class="regform">
            <h2>Registration form</h2>
        </div>
        <div class="nane">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div id="name">
                    <h2 class="name">Name</h2>
                <input class="roll" type="text" name="name" required="">

                </div>
                <h2 class="name">Mail id</h2>
                <input class="email" type="email" name="email" required="">
                
                <h2 class="name">Password</h2>
                <input class="pw" type="Password" name="password" required="">
                <h2 class="name">Confirm Password</h2>
                <input class="pw" type="Password" name="cpassword" required="">
                <h2 class="name">Student or Teacher</h2>
                <select class="option" name="role">
					<option disabled="disabled" selected="selected">--Choose</option>
					<option> Student</option>
					<option> Teacher</option>
				</select>
                <button type="submit" name="submit"> Register</button>
            </form>
        </div>
    </div>
</body>

</html>