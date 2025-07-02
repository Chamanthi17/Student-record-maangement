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
    <title>Teacher login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        
        .baner {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(college.jpeg);
            background-size: cover;
            background-position: center;
            display: flex;
        }
        
        #details {
            background-color: #f7e7a2;
            margin-left: 138px;
            margin-top: 50px;
            float: left;
            width: 50%;
            font-size: 20px;
            height: 80%;
            text-align: center;
            justify-content: center;
        }
        
        #buttons {
            background-color: #6b350e;
            float: right;
            margin-top: 50px;
             display: grid;
            justify-content: center;
            text-align: center;
            width: 50%;
            height: 80%;
            color: #e0c372;
            margin-right: 131px;
        }
        
        .btn {
            border: 5px;
            text-decoration-color: #6b350e;
            text-align: center;
            justify-content: center;
            text-decoration: none;
            display: list-item;
            font-size: 17px;
            cursor: pointer;
            background-color: #f7e7a2;
            margin: 20px 135px 20px 140px;
            width: 300px;
            border-radius: 12px;
            padding: 14px 110px;
        }
        
        .btn:hover {
            background-color: #ffe059;
            color: firebrick;
        }
        
        .det {
            float: left;
            margin-left: 20px;
        }

    </style>
</head>

<body>

<?php
    $e=$_SESSION['mail'];
    $det_search="select * from teacherdetails where mailid='$e'";
    $query=mysqli_query($con,$det_search);
    $det=mysqli_fetch_assoc($query);
    $name=$det['name'];
    $branch=$det['branch'];
    $mail=$det['mailid'];
    $address=$det['address'];


?>

    <div class="baner">
        <div id="details"><br>
            <h3> Details</h3><br>
            <h5 class="det">Name: <?php echo  $name;?></h5><br>
            <h5 class="det">Branch <?php echo    $branch;?></h5><br>
            <h5 class="det">Mail id: <?php echo  $mail;?></h5><br>
            <h5 class="det">Address: <?php echo  $address;?></h5><br><br><br>
            
        </div>
        <div id="buttons"><br>
            <h2>Welcome <?php echo  $_SESSION['name'];?></h2><br><br>
            <a style="text-decoration: none;" href="stmarks.php"><button class="btn" >marks</button></a>
            <a style="text-decoration: none;" href="tenews.php"><button class="btn">News</button></a>
            <a style="text-decoration: none;" href="exit.php"><button class="btn">exit</button></a>
        </div>
    </div>
</body>

</html>