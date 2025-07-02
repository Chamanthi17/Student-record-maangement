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
	<title>Student login</title>
	<style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        
        .banner{
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(college.jpeg);
            background-size: cover;
            background-position: center;
            display: flex;
        }
        
        #details {
            background-color: #f7e7a2;
            margin-left: 15%;
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
            justify-content: center;
            text-align: center;
            width: 50%;
            height: 80%;
            color: #f7e7a2;
            margin-right: 15%;
            display: grid;
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
            padding: 14px 90px;

        }
        
        .btn:hover {
            background-color: #ab4e0b;
            color: white;
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
    $det_search="select * from studentdetails where mailid='$e'";
    $query=mysqli_query($con,$det_search);
    $det=mysqli_fetch_assoc($query);
    $name=$det['name'];
    $roll=$det['rollno'];
    $branch=$det['branch'];
    $year=$det['year'];
    $mail=$det['mailid'];
    $address=$det['address'];


?>




	<div class="banner">
        <div  id="details"><br>
            <h3>Student details</h3><br>
            <h5 class="det">Name: <?php echo  $name;?></h5><br>
            <h5 class="det">Roll no:  <?php echo $roll;?></h5><br>
            <h5 class="det">Branch <?php echo    $branch;?></h5><br>
            <h5 class="det">Year: <?php echo   $year;?></h5><br>
            <h5 class="det">Mail id: <?php echo  $mail;?></h5><br>
            <h5 class="det">Address: <?php echo  $address;?></h5><br><br><br>
        </div>
        <div id="buttons"><br>
            <h2>Welcome <?php echo  $_SESSION['name'];?></h2><br><br>
            <a style="text-decoration: none;" href="prevmarks.php"><button class="btn" >Last sem marks</button></a>
            <a style="text-decoration: none;" href="subj.php"><button class="btn" > Subjects</button></a>
            <a style="text-decoration: none;" href="stnews.php"><button class="btn">News</button></a>
            <a style="text-decoration: none;" href="exit.php"><button  class="btn">exit</button></a>
        </div>
    </div>
</body>
</html>