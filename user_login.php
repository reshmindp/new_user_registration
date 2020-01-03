<!-- <?php
 

include 'dbconnection.php';

if(isset($_POST["subm"]))
{
$username=$_POST["uname"];
$password=$_POST["passw"];
$sql1=mysqli_query($con,"select id from user_login where username='$username' and password='$password'");
$sql2=mysqli_fetch_array($sql1);
if($sql2)
{
  
  $_SESSION["userlogin"]=$sql2["id"];
  echo "<script>alert('Login successfull')</script>";
  echo "<script>window.location='user_home.php'</script>";
}
else
{
  echo "<script>alert('Incorrect username or password')</script>";
}

}

?> -->


<?php
include 'dbconnection.php';
session_start();


if(isset($_POST['subm']))
{
  $username = $_POST['uname'];
  $password = $_POST['passw'];

  $query = mysqli_query($connection, "SELECT * FROM `tbl_login` WHERE username = '$username' AND password = '$password'");

  if(mysqli_num_rows($query) > 0)
  {

    

    header('location: single_data.php');

  }
  else
  {
    echo "<script>alert('Invalid user details!');</script>";

  }

}



 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<form method="post" enctype="multipart/form-data">
<table width="200" border="1">
  <tr>
    <th scope="row">Username</th>
    <td><input name="uname" id="uname" type="text" placeholder="Username"></td>
  </tr>
  <tr>
    <th scope="row">Password</th>
    <td><input name="passw" id="passw" type="password" placeholder="Password"></td>
  </tr>
</table>
<input type="submit" value="Login" name="subm" style="padding:5px; margin-top:10px;">
</form>

<body>
</body>
</html>