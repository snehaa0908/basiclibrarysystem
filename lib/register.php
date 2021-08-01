<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="register.css">
    
    <script src="https://kit.fontawesome.com/abdab7f3b2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="navabt">
	
        <div class="conabt"><a href='#'><i class="fas fa-book-reader"></i> LIBRARY</a></div>
</div>
<form class="form" method="POST" action="#">
<legend>Enter your details</legend>
				<div class="icon">
				<i class="fas fa-envelope"></i> <input class="m-email" type="email" name="m_email" id="m_email" placeholder="Email" required />
				</div>
				
				<div class="icon">
				<i class="fas fa-lock"></i>	<input class="m-pass" type="password" name="m_pass" placeholder="Password" required />
				</div>
                
				<div class="icon">
				<i class="fas fa-address-book"></i> <input class="m-name" type="text" name="m_name" placeholder="Full Name" required />
				</div>
				
				
				
				<div class="icon">
				<i class="fa fa-phone"></i> <input class="m-phone" type="number" name="m_pno" id="m_balance" placeholder=  "Phone no" required />
				</div>
				<div>
				<button type="submit" name="submit"> SUBMIT</button>
				</div>
</form>
</html>
<?php 
$connection=mysqli_connect("localhost","id17336622_books","Snehaasnehaa123$","id17336622_library") or die("no connected");
mysqli_select_db($connection,"id17336622_library") or die("no database");
if(isset($_POST['submit']))
{
$name=$_POST['m_name'];
$email=$_POST['m_email'];
$password=$_POST['m_pass'];
$phone=$_POST['m_pno'];
$sql = "SELECT Mail from user";
$result= $connection-> query($sql);
	if($result-> num_rows > 0){
		while($row = $result-> fetch_assoc()){
			if($row['Mail']==$email){
				echo '<script>alert("E-Mail Already Exist")';
				exit();
			}
		}
	}
$details="INSERT INTO user_details (m_name,m_email,m_pass,m_pno) VALUES ('$name','$email','$password','$phone')";
$query=mysqli_query($connection,$details);
$table="INSERT INTO user (Mail,Password) VALUES ('$email','$password')";
$query=mysqli_query($connection,$table);
header("Refresh:0;url=user.php");
}
?>
