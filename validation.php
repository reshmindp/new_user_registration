<?php 

include 'dbconnection.php';

if(isset($_POST['subm']))
{
  $name   = $_POST['nm'];
  $mobile = $_POST['mb'];
  $email = $_POST['eml'];
  $qualification = $_POST['qual'];
  $pic = $_FILES['file_pic']['name'];

  $file_details = pathinfo($pic);
  $file_ext     = $file_details['extension'];
  $file_name    = str_replace(" ", "_", strtolower($name)).rand().'.'.$file_ext;

  $qu = implode(",", $qualification);

  mysqli_query($con,"INSERT INTO `tbl_user_login`(`username`, `password`) VALUES ('$username','$password')");

  $login_id = mysqli_insert_id($con);

  mysqli_query($con, "INSERT INTO `tbl_user_details`(`login_id`, `name`, `mobile`, `email_id`, `district`, `gender`, `photo`) VALUES ('$login_id','$name', '$mobile')");

  move_uploaded_file($_FILES['file_pic']['tmp_name'], "images/".$file_name);


}




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" enctype="multipart/form-data">

<table width="200" border="1">
  <tr>
    <th scope="row">Name</th>
    <td><input name="nm" id="name" type="text" placeholder="Enter your name" onKeyUp="clearmsg('sp1')"><span id="sp1" style="color:red"></span></td>
    
  </tr>
  <tr>
    <th scope="row">Mobile</th>
    <td><input name="mb" id="mb" type="text" placeholder="Mobile"  onKeyUp="clearmsg('sp2')"><span id="sp2" style="color:#F00"></span></td>
  </tr>
 
  <tr>
    <th scope="row">Email</th>
    <td><input name="eml" id="eml" type="email" placeholder="Email"></td>
  </tr>
  
    <tr>
    <th scope="row"> Select District</th> 
    <td><select name="dist" id="dist" onChange="clearmsg('sp4')">
     <option value="">Select District</option>
     <option value="Calicut" >Calicut</option>
     <option value="Ernakulam">Ernakulam</option>
    </select><span id="sp4" style="color:#F00"></span></td>
  </tr>
 
   <tr>
    <th scope="row">Gender</th>
    <td><input name="gender" type="radio" value="Male" onClick="clearmsg('sp5')">Male<br><input name="gender" type="radio" value="Female" 
    onClick="clearmsg('sp5')">Female<span id="sp5" style="color:#F00"></span></td>
  </tr>
 
  <tr>
    <th scope="row">Qualification</th>
    <td><input name="qual[]" type="checkbox" value="SSLC" onClick="clearmsg('sp6')">SSLC<br><input name="qual[]" type="checkbox" value="PLUS TWO"
    onClick="clearmsg('sp6')">PLUS TWO<br><input name="qual[]" type="checkbox" value="UG" onClick="clearmsg('sp6')">UG<br>
    <input name="qual[]" type="checkbox" value="PG" onClick="clearmsg('sp6')">PG<br>
    <span id="sp6" style="color:#F00"></span></td>
  </tr>
  
     <tr>
    <th scope="row">Address</th>
    <td><textarea name="address" id="address" placeholder="enter your address"></textarea></td>
  </tr>
  <tr>
    <th scope="row">Photo</th>
    <td><input type="file" id="photo" name="file_pic"></td>
  </tr>
  
  <tr>
    <th scope="row">Username</th>
    <td><input name="uname" id="uname" type="text" placeholder="Username" onKeyUp="clearmsg('sp7')"><span id="sp7" style="color:#F00"></span></td>
    
  </tr>
  
  <tr>
    <th scope="row">Password</th>
    <td><input name="passw" id="passw" type="password" placeholder="Password" onKeyUp="clearmsg('sp8')"><span id="sp8" style="color:#F00"></span></td>
    
  </tr>
 
</table>
<input type="submit" value="submit" onclick="return valid();" name="subm"  style="padding:8px; margin-top:10px;">
</form>

</body>
</html>

<!-- <script type="text/javascript">
	
function valid()
{
	var name = document.getElementById("nm").value.trim();
	var mobile = document.getElementById("mb").value.trim();
	var gen = document.getElementsByName("gender");
	var qualificaion = document.getElementsByName("qual");

	if(name=="")
	{
		document.getElementById('sp1').innerHTML = "Name field required";

		return false;
	}
	
}

function clearmsg(span)
{

	document.getElementById(span).innerHTML="";

}
</script> -->

<script type="text/javascript">

  function valid()
  {
    var name   = document.getElementById('name').value;
    var mobile = document.getElementById('mb').value;
    var email  = document.getElementById('eml').value;
    var district = document.getElementById('dist').value;

    var gender = document.getElementsByName('gender');
    var qualif = document.getElementsByName('qual[]');

    var address  = document.getElementById('address').value;
    var photo    = document.getElementById('photo').value;
    var username = document.getElementById('uname').value;
    var password = document.getElementById('passw').value;

    if(name == "")
    {
      document.getElementById('sp1').innerHTML = "Name required!";
      return false;
    }


    flag = 0;

    for(i=0;i<gender.length;i++)
    {
      if(gender[i].checked==true)
      {
        flag = 1;
        break;
      }

    }

    if(flag==0)
    {
      document.getElementById('genSpan').innerHTML = "Select a gender!";

      return false;
    }
     

     flagb = 0;

    for(i=0;i<qualif.length;i++)
    {
      if(qualif[i].checked==true)
      {
        flagb = 1;
        break;
      }

    }

    if(flagb == 0)
    {
      document.getElementById('checkspan').innerHTML = "Select a qualification!";

      return false;
      
    }









  }
  
</script>