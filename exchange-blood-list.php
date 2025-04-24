<?php include('connection.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="s1.css">
<style type="text/css"></style>
</head>
<body  style="background-image: url('https://cdn.leonardo.ai/users/0ca3acee-fb31-4ae8-8203-015c84e40453/generations/aba6e052-7071-401d-a007-3af30ae03f63/Leonardo_Phoenix_A_crisp_white_page_serving_as_the_central_foc_3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; margin: 0;">
<div id="full">
<div id="inner_full">
<div id="header"><h2><a href="admin-home.php" style="text-decoration: none;color: black;">Blood Bank Management System</a></h2></div>
<div id="body">
<br>
<?php if (!isset($_SESSION['un'])) { header("Location:index.php"); exit(); } ?>
<h3>Exchange Blood Registration</h3>
<center><div id="form">
<form action="" method="post">
<table>
<tr>
<td width="200px" height="50px">Enter Name</td>
<td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name" required></td>
<td width="200px" height="50px">Enter Father's Name</td>
<td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father Name" required></td>
</tr>
<tr>
<td width="200px" height="50px">Enter Address</td>
<td width="200px" height="50px"><textarea name="address" required></textarea></td>
<td width="200px" height="50px">Enter City</td>
<td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City" required></td>
</tr>
<tr>
<td width="200px" height="50px">Enter Age</td>
<td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age" required></td>
<td width="200px" height="50px">Enter E-Mail</td>
<td width="200px" height="50px"><input type="email" name="email" placeholder="Enter E-Mail" required></td>

</tr>
<tr>
<td width="200px" height="50px">Enter Mobile No</td>
<td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No" required></td>
</tr>
<tr>
<td width="200px" height="50px">Select Blood Group</td>
<td width="200px" height="50px">
<select name="bgroup" required>
<option value="O+">O+</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
</select>
</td>
<td width="200px" height="50px">Exchange Blood Group</td>
<td width="200px" height="50px">
<select name="exbgroup" required>
<option value="O+">O+</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
</select>
</td> 
</tr>
<tr>
<td><input type="submit" name="sub" value="Save"></td>
</tr>
</table>
</form>
<?php
if (isset($_POST['sub'])) 
{
    // front end data input
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $age = $_POST['age'];
     $bgroup = $_POST['bgroup'];
    $mno = $_POST['mno'];
    $email = $_POST['email'];
    $exbgroup = isset($_POST['exbgroup']) ? $_POST['exbgroup'] : null;
     // front end data input end

     // select and insert
    $q = "SELECT * FROM donor_registration where bgroup= '$bgroup' ";
    $st=$db ->query($q);
     $num_row=$st->fetch();
     $id=$num_row['id'];
     $name=$num_row['Name'];
     $b1=$num_row['bgroup'];
     $mno=$num_row['mno'];
     $q1 = "INSERT INTO out_stoke_b (bname, Name, mno) VALUES (?, ?, ?)";
     $st1 = $db->prepare($q1);
     $st1->execute([$b1, $name, $mno]);
     // select and insert end


     // delete code
     $q2="delete from donor_registration where id='$id'";
     $st1=$db->prepare($q2);
     $st1->execute();
     // delete 


     // exchange info insert
    $q = $db->prepare("INSERT INTO exchange_b(name, fname, address, city, age, bgroup, email, mno, ebgroup) VALUES (:name, :fname, :address, :city, :age, :bgroup, :email, :mno, :ebgroup)");
    $q->bindValue('name', $name);
    $q->bindValue('fname', $fname);
    $q->bindValue('address', $address);
    $q->bindValue('city', $city);
    $q->bindValue('age', $age);
    $q->bindValue('bgroup', $bgroup);
    $q->bindValue('email', $email);
    $q->bindValue('mno', $mno);
    $q->bindValue('ebgroup', $exbgroup);

    if ($q->execute()) {
        echo "<script>alert('Registration successful')</script>";
    } else {
        echo "<script>alert('Donor registration failed')</script>";
    }
    // exchange info insert end
}


?>
</div></center>
</div>
<div id="footer">
<h4 align="center">Copyright@bbms</h4>
<p align="center"><a href="logout.php"><font color="black">Logout</font></a></p> 
</div>
</div> 
</body>
</html>
