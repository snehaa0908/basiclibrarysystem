<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="lib.css">
    
    <script src="https://kit.fontawesome.com/abdab7f3b2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="navabt">
    
      
                
        <div class="conabt"><a href='#'><i class="fas fa-book-reader"></i> LIBRARY</a></div>
</div>
<form class="form" method="POST" action="#">
<legend>Enter login details</legend>
                <div class="icon">
				<i class="fas fa-user"></i>	<input  class="m-user" type="text" name="m_user" id="m_user" placeholder="E-MailID" required />
				</div>
				
				<div class="icon">
				<i class="fas fa-lock"></i>	<input class="m-pass" type="password" name="m_pass" placeholder="Password" required />
				</div>
                <br></br>
                <button type="submit" name="m_login"><i class="btn btn-danger"style="width:200px; heigth:50px;">LOGIN</i></button>
</form>
</body>
</html>
<?php 
$connection=mysqli_connect("remotemysql.com","5XnFWGlHJx","J4BSTJHZaE","5XnFWGlHJx") or die("no connected");
mysqli_select_db($connection,"5XnFWGlHJx") or die("no database");
if(isset($_POST['m_login']))
{
$name=$_POST['m_user'];
$password=$_POST['m_pass'];
$sql = "SELECT * from admin";
$i=0;
$result= $connection-> query($sql);
	if($result-> num_rows > 0){
		while($row = $result-> fetch_assoc()){
		if($row['Mail']==$name and $row['Password']==$password){
			header("Refresh:0;url=index1.php");
			$i=1;
		}
	}
		if($i==0){
			echo '<script>alert("Invalid Username or Password")</script>';
		}
	}
}
?>
