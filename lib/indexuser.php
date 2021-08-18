<!DOCTYPE html>
<html>
<head>
    <title>Library</title>
    <link rel="stylesheet" href="book.css">
    
    <script src="https://kit.fontawesome.com/abdab7f3b2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="navabt">
    <a href="home.php"><i class="fas fa-power-off"></i>
                    LOGOUT</a>
       <a href="index1.php"><i class="fas fa-home"></i>
                HOME</a> 
               
        <div class="conabt"><a href='#'><i class="fas fa-book-reader"></i> LIBRARY</a></div>
</div>
<table >
        <tr>
            <th><a class="btn btn-secondary"style="width:100px; heigth:50px;">Id</th>
            <th><a class="btn btn-secondary"style="width:300px; heigth:50px;">USERNAME</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:50px;">ACTION</th>
            
        </tr>
        <?php
		$connection=mysqli_connect("remotemysql.com","5XnFWGlHJx","J4BSTJHZaE","5XnFWGlHJx") or die("no connected");
mysqli_select_db($connection,"5XnFWGlHJx") or die("no database");
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT Id,Mail from user";
		$result= $connection-> query($sql);
		$i=1;
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				?>
				<tr>
					
					<td><a class="btn btn-info"style="width:100px; heigth:50px;"><?php echo $row['Id']; ?> </td>
					<td><a class="btn btn-info"style="width:300px; heigth:50px;"><b><?php echo $row['Mail']; ?> </b></td>
				
					<td><b><a class="btn btn-danger"style="width:150px; heigth:50px;" href="indexuser.php?Id=<?php echo $row['Id'] ?>"> DELETE </a></b></td>
                    
				</tr>                            
			<?php
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		?>
	</table>
    <br></div></div>   
</div>
<?php 
if(isset($_GET['Id'])){
	$Id=$_GET['Id'];
	$del="DELETE FROM user WHERE $Id=Id";
	$query=mysqli_query($connection,$del);
	if($query){
		echo '<script>alert(" User removed!!!!")</script>';
        header("Refresh:0;url=indexuser.php");

	}
}
?>


</html>
