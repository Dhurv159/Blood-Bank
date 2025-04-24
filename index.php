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
<div id="header"><h2>Blood Bank Management System</h2></div>
<div id="body">
<br><br><br><br><br>
<form action="" method="post">
<table align="center">
<tr>
<td width="200px" height="70px"><b>Enter Username</b></td>
<td width="100px" height="70px"><input type="text" name="un" placeholder="Enter Username" style=" width: 180px;height: 30px; border-radius: 10px;"></td>
</tr>
<tr>
<td width="200px" height="70px"><b>Enter Password</b></td>
<td width="200px" height="70px"><input type="text" name="ps" placeholder="Enter Password" style=" width: 180px; height: 30px; border-radius: 10px;"></td>
</tr>
<tr>
<td><input type="submit" name="sub" value="Login" style="width: 70px; height: 30px; border-radius: 5px;"></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['sub']))
{
     $un=$_POST['un'];
     $ps=$_POST['ps'];
     $q=$db->prepare("SELECT * FROM admin WHERE uname='$un' AND pass='$ps'");
     $q->execute();
     $res=$q->fetchAll(PDO::FETCH_OBJ);
     if($res){
        $_SESSION['un']=$un;
        header("Location:admin-home.php");
     }
     else{
        echo "<script>alert('Wrong User')</script>";
     }
}
?>
</div>
<div id="footer"><h4 align="center">Copyright@bbms</h4></div>
</div>
<div> 
</body>
</html>