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
    <title>Student marks</title>
<style type="text/css">
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
        .det {
            float: left;
            margin-left: 20px;
        }

        #buttons {
            background-color:#6b350e;
            float: right;
            margin-top: 50px;
           
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
            margin: 20px 45px 20px 200px;
            width: 5px;
            border-radius: 12px;
            padding: 14px 90px;
        }
        
        .btn:hover {
            background-color: #ffe059;
            color: firebrick;
        }
        .srh input,button{
            width: 30%;
            border: 2px solid white;
            padding: 10px;
        }
        .srh button:hover{
            background-color: rosybrown;
        }
        table{
            width:400px; height:100px;
             margin-left:70px;
            border-style:solid;
            border-collapse: seperate;
            border-spacing:  2px;
            border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
            border-left-width: 2px;
    
            
    font-size: medium;
    font-style: normal;
    text-align: center;
    
    border-color: #f7e7a2 ;
    
}
th,td{
    color:white;
}
    </style>
</head>

<body>
<?php
    $email=$_SESSION['mail'];
    $det_search="select * from teacherdetails where mailid='$email'";
    $query=mysqli_query($con,$det_search);
    $det=mysqli_fetch_assoc($query);
    $name=$det['name'];
    $branch=$det['branch'];
    $mail=$det['mailid'];
    $address=$det['address'];
    if(isset($_POST['s'])){
        $num=$_POST['srch'];
        $st_search="select * from studentdetails where mailid like'$num%'";
        $stq=mysqli_query($con,$st_search);
        $email_count=mysqli_num_rows($stq);
    if($email_count){
        $st=mysqli_fetch_assoc($stq);
        $sname=$st['name'];
        $sbranch=$st['branch'];
        $syear=$st['year'];
        $ds_search="select * from ds where mailid like '$num%'";
        $jp_search="select * from jp where mailid like '$num%'";
        $jplab_search="select * from jplab where mailid like '$num%'";
        $dslab_search="select * from dslab where mailid like '$num%'";
        $dcld_search="select * from dcld where mailid like'$num%'";
        $mfcs_search="select * from mfcs where mailid like '$num%'";
        $ps_search="select * from ps where mailid like '$num%'";
        $gpa_search="select * from gpa where mailid like '$num%'";
        $query1=mysqli_query($con,$ds_search);
        $ds=mysqli_fetch_assoc($query1);
        $dsg=$ds['grade'];
        $query2=mysqli_query($con,$jp_search);
        $jp=mysqli_fetch_assoc($query2);
        $jpg=$jp['grade'];
        $query3=mysqli_query($con,$dslab_search);
        $dslab=mysqli_fetch_assoc($query3);
        $dslabg=$dslab['grade'];
        $query4=mysqli_query($con,$jplab_search);
        $jplab=mysqli_fetch_assoc($query4);
        $jplabg=$jplab['grade'];
        $query5=mysqli_query($con,$dcld_search);
        $dcld=mysqli_fetch_assoc($query5);
        $dcldg=$dcld['grade'];
        $query6=mysqli_query($con,$mfcs_search);
        $mfcs=mysqli_fetch_assoc($query6);
        $mfcsg=$mfcs['grade'];
        $query7=mysqli_query($con,$ps_search);
        $ps=mysqli_fetch_assoc($query7);
        $psg=$ps['grade'];
        $query8=mysqli_query($con,$gpa_search);
        $gp=mysqli_fetch_assoc($query8);
        $gpg=$gp['gpa'];
    }
    }

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
            <h2>Student marks</h2><br>
            <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="srh">
            <input type="text" name="srch" placeholder="Enter rollno" required>
            <button name="s">search</button>
            </div>
            </form>
            <br>
            <?php
            if(isset($_POST['s'])){
                $email_count=mysqli_num_rows($stq);
    if($email_count){
                echo "<span style='color:white; text-align:left;'> Student details: </span>"."<br>";
                echo "<span style='color:white; text-align:left;'> Name: </span> ".$sname."<br>";
                echo "<span style='color:white; text-align:left;'> Branch: </span> ".$sbranch."<br>";
                echo "<span style='color:white; text-align:left;'> Year: </span> ".$syear."<br>";
                echo "<table border='1'>
                <tr>
                <th>subject</th>
                <th>grade</th>
                </tr>
                <tr>";
                echo "<tr>";
                echo "<td>DS</td>";
                echo "<td>".$dsg."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>JP</td>";
                echo "<td>".$jpg."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>DCLD</td>";
                echo "<td>".$dcldg."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>PS</td>";
                echo "<td>".$psg."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>MFCS</td>";
                echo "<td>".$mfcsg."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>DS LAB</td>";
                echo "<td>".$dslabg."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>JP LAB</td>";
                echo "<td>".$jplabg."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Overall GPA</td>";
                echo "<td>".$gpg."</td>";
                echo "</tr>";
            echo "</table>";
            }
            else{
                echo "Enter valid rollno"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>";
            }
        }
        else{
            echo "<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>";
        }
?>
             <a style="text-decoration: none;" href="teach.php"><button id="ex" class="btn">Back</button></a>
        </div>
    </div>

</body>

</html>