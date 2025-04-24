<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="s1.css">
</head>
<body  style="background-image: url('https://cdn.leonardo.ai/users/0ca3acee-fb31-4ae8-8203-015c84e40453/generations/aba6e052-7071-401d-a007-3af30ae03f63/Leonardo_Phoenix_A_crisp_white_page_serving_as_the_central_foc_3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; margin: 0;">

<div id="full">
<div id="inner_full">
<div id="header"><h2><a href="admin-home.php" style="text-decoration: none;color: Black;"> Blood Bank Management System</a></h2></div>
<div id="body">
<br>
<?php
 $un=$_SESSION['un'];
if(!$un){
    header("Location:index.php");
}
?>
<h3>Welcome Admin</h3> <br><br>
<ul>
<li><a href="donor-reg.php" style="font-weight: bold;">Donor Registration</a></li>
    <li><a href="donor-list.php " style="font-weight: bold;">Donor List</a></li>
    <li><a href="stoke-blood-list.php" style="font-weight: bold;">Stoke Blood List</a></li>
</ul><br><br><br><br>
<ul>
    <li><a href="out-stoke-blood-list.php" style="font-weight: bold;">Out Stoke Blood List</a></li>
    <li><a href="exchange-blood-list.php" style="font-weight: bold;">Exchange Blood Registration</a></li>
    <li><a href="exchange-blood-list1.php" style="font-weight: bold;">Exchange Blood List</a></li>
</ul>

</div>
<div id="footer"><h4 align="center">Copyright@bbms</h4>
<p align="center"><a href="logout.php"><font color="black">Logout</font></a></p> 
</div>
</div>
<div> 
</body>
</html>