<?php include('connection.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="s1.css">
<style type="text/css">
        #form1{
        width: 80%;
        height: 320px;
        background-color:    background-color: rgba(250, 240, 230, 0.7); /* Semi-transparent linen color */
        ;
        color: black;
        border-radius: 10px;
    }
    td {
        width: 200px;
        height: 40px;
    }
    /* Adding padding to each cell and margin to the first row */
    table {
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: center;
        border: 1px solid black;
    }
    /* Add extra spacing below the first row */
    tr:first-of-type {
        margin-bottom: 20px;
    }
    tr:first-of-type + tr {
        border-top: 20px solid transparent;
    }
</style>
</head>
<body  style="background-image: url('https://cdn.leonardo.ai/users/0ca3acee-fb31-4ae8-8203-015c84e40453/generations/aba6e052-7071-401d-a007-3af30ae03f63/Leonardo_Phoenix_A_crisp_white_page_serving_as_the_central_foc_3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; margin: 0;">
<div id="full">
<div id="inner_full">
<div id="header"><h2><a href="admin-home.php" style="text-decoration: none;color: black;">Blood Bank Management System</a></h2></div>
<div id="body">
<br>
<?php if (!isset($_SESSION['un'])) 
{ header("Location:index.php"); exit(); 
} ?>
<h3>Out Stoke Blood List</h3>
<center><div id="form1">
<table>
<tr>
    <td><center><b>Name</b></center></td>
    <td><center><b>Mobile no</b></center></td>
    <td><center><b>Blood Group</b></center></td>
</tr>
<?php
$q=$db->query("SELECT * FROM out_stoke_b");
while($r1=$q->fetch(PDO::FETCH_OBJ)) {
?>
<tr>
    <td><center><?= $r1->Name; ?></center></td>
    <td><center><?= $r1->mno; ?></center></td>
    <td><center><?= $r1->bName; ?></center></td>
</tr>
<?php
}
?>
</table>
</div></center>
</div>
<div id="footer">
<h4 align="center">Copyright@bbms</h4>
<p align="center"><a href="logout.php"><font color="white">Logout</font></a></p> 
</div>
</div> 
</body>
</html>
