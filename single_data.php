<?php
include 'dbconnection.php';
session_start();

$login_id = $_SESSION['user_id'];

 $array_data = mysqli_query($connection, "SELECT * FROM `tbl_user_details` WHERE login_id = '$login_id'");

$user_details = mysqli_fetch_assoc($array_data);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SigleData</title>
</head>

<table width="200" border="1">
     
  <tr>
    <th scope="row">Name</th>
    <td><?php echo $user_details['name']; ?></td>   
  </tr>
  <tr>
    <th scope="row">Mobile</th>
    <td></td>
  </tr>
  <tr>
    <th scope="row">Email</th>
   <td> </td>
  </tr>
  <tr>
    <th scope="row">District</th>
   <td></td>
  </tr>
  <tr>
    <th scope="row">Gender</th>
    <td></td>
  </tr>
  <tr>
    <th scope="row">Qualification</th>
   <td></td>
  </tr>
  <tr>
    <th scope="row">File</th>
    <td></td>
  </tr>
  <tr>
    <th scope="row">Username</th>
    <td></td>
  </tr>
</table>

<body>
</body>
</html>