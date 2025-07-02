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
    <meta charset="utf-8">
    <title> Forgot Password</title>

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
            width: 400px;
            background-color: rgb(171, 188, 214);
            color: #fff;
            margin: auto;
            padding: 10px 0px 5px 0px;
            text-align: center;
            border-radius: 15px 15px 0px 0px;
        }
        
        .nane {
            background-color: whitesmoke;
            width: 400px;
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
            left: 18px;
            top: -20px;
            line-height: 30px;
            width: 300px;
            border-radius: 8px;
            padding: 0 2px;
            font-size: 14px;
            color: black;
        }
        
        button {
            background-color: aquamarine;
    display: block;
    margin: -5px 0px 10px 80px;
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
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $email_search="select * from register where mailid='$email'";
    $query=mysqli_query($con,$email_search);
    $email_count=mysqli_num_rows($query);
    if($email_count){
        $email_pass=mysqli_fetch_assoc($query);
        $username=$email_pass['name'];
        $_SESSION['mail']=$email_pass['mailid'];
        $sub="Change your Password";
        $body="Hi, $username. Click here to change your password.
        http://localhost/phpt/pass.php ";
        $ssender="From:yourmail@gmail.com";
        
        if(mail($email,$sub,$body,$ssender)){
        ?>
                <script>
                alert("Check your mail id");
                location.replace("home.php");
                </script>
                <?php
        }else{
            ?>
            <script>
            alert("Email not sent");
            </script>
            <?php
        }

    }else{
        ?>
        <script>
        alert("Your email is not registered. Kindly Register..!!");
        location.replace("reg.php");
        </script>
        <?php
    }
}
?>




<div class="banner">
        <br><br><br><br><br><br><br>
               <div class="regform">
            <h2>Forgot Password</h2>
        </div>
        <div class="nane">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
            <h4 class="name">  Enter your registered Mail id :</h4><br>
                <input class="email" type="email" name="email" required="">
                <button type="submit" name="submit"> Submit</button>
            </form>
        </div>
    </div>
</body>

</html>