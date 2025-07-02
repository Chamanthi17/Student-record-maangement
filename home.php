<?php
$server="localhost";
$user="root";
$password="";
$db="studentrecord";
$con=mysqli_connect($server,$user,$password,$db);
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Student record management system</title>

    <style type="text/css">
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
        
        .student {
            width: 100%;
            margin-top: 50;
            position: absolute;
            text-align: center;
            color: #fff;
        }
        
        .logo {
            margin-left: 30px;
            margin-top: 20px;
            width: 150px;
            cursor: pointer;
        }
        
        .child {
            border: 100px;
            margin-top: 50;
            margin-left: 30px;
            float: left;
            width: 40%;
            color: #fff;
            position: absolute;
            text-align: left;
        }
        
        .rgt {
            position: absolute;
            top: 25%;
            transform: translateY(35%);
            transform: translateX(220%);
            width: 350px;
            background: whitesmoke;
            border-radius: 10px;
        }
        
        .rgt h1 {

            text-align: center;
            padding: 10px 10px 20px 0;
            border-bottom: 0.5px solid silver;
        }
        
        .rgt form {
            padding: 0px 40px;
            box-sizing: border-box;
        }
        
        form .txt_field {
            position: relative;
            border-bottom: 1px solid #adadad;
            margin: 25px 10px;
        }
        
        .txt_field input {
            width: 100%;
            padding: 1 5px;
            height: 40px;
            font-size: 14px;
            border: none;
            background: none;
            outline: none;
        }
        
        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 14px;
            pointer-events: none;
            transition: .5s;
        }
        
        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }
        
        .txt_field input:focus~label,
        .txt_field input:valid~label {
            top: -5px;
            color: #2691d9;
        }
        
        .txt_field input:focus~span::before,
        .txt_field input:valid~span::before {
            width: 100%;
        }
        
        .pass {
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }
        
        .pass:hover {
            text-decoration: underline;
        }
        
        input[type="submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 16px;
            color: #e9f4fb;
            font-weight: 500;
            cursor: pointer;
            outline: none;
        }
        
        input[type="submit"]:hover {
            border-color: #2691d9;
            transition: .5s;
        }
        
        .signuplink {
            margin: 30px 0;
            text-align: center;
            font-size: 14px;
            color: #666666;
        }
        
        .signuplink a {
            color: #2691d9;
            text-decoration: none;
        }
        
        .signuplink a:hover {
            text-decoration: underlines;
        }
    </style>
</head>

<body>
<?php
if(isset($_POST['submit'])){
    $email=$_POST['mailid'];
    $password=$_POST['pw'];

    $email_search="select * from register where mailid='$email'";
    $query=mysqli_query($con,$email_search);
    $email_count=mysqli_num_rows($query);
    if($email_count){
        $email_pass=mysqli_fetch_assoc($query);
        $db_pass=$email_pass['password'];
        $_SESSION['name']=$email_pass['name'];
        $_SESSION['mail']=$email_pass['mailid'];
        $type=$email_pass['prof'];
        $pass_decode=password_verify($password,$db_pass);
        if($pass_decode){
            if($type=='Student'){
                ?>
                <script>
                location.replace("stu.php");
                </script>
                <?php
            }else{
                ?>
                <script>
                location.replace("teach.php");
                </script>
                <?php
            }

        }else{
            ?>
                <script>
                alert("Password incorrect");
                </script>
                <?php
        }
    }else{
        ?>
        <script>
        alert("Invalid email.Kindly register..");
        location.replace("reg.php");
        </script>
        <?php
    }

}


?>


    <div class="banner">
        <div class="student"><br>
            <h1> STUDENT RECORD MANAGEMENT SYSTEM</h1>
        </div>
        <img src="logo.jpeg" class="logo">
        <section class="child"><br><br>
            Vasireddy Venkatadri Institute of technology, VVIT is a well known college with higher standards of education and a friendly environment which makes students to grab its attention. VVIT is the one and only college to achieve NAAC and NBA with in 10 years
            of inception. Also its the first college to host Google's Codelab in India.
            <br>It is loacated at Nambur, Guntur.
            <br>Contact no: 9849549336
            <br>Mail : principaloffice@vvit.net<br><br><br>
            <a target="blank" href="https://www.vvitguntur.com/" style="color: rgb(171,188,214);">To know more info click here</a>
        </section>
        <div class="rgt">
            <h1>Login</h1>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="txt_field">
                    <input type="text" name="mailid" required>
                    <span></span>
                    <label>Mail id</label>
                </div>
                <div class="txt_field">
                    <input type="Password" name="pw" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="pass"><a style="text-decoration: none; color:#666666;" href="forgot.php">Forgot Password ?</a></div>
                <input type="submit" name="submit" value="Login">
                <div class="signuplink"> Not a member ? <a href="reg.php">Signup</a></div>
            </form>
        </div>
    </div>
</body>

</html>