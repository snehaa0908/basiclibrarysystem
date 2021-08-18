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
         
       <a href="book.php"><i class="fas fa-address-book"></i>
                    BOOKS</a> 
               
        <div class="conabt"><a href='#'><i class="fas fa-book-reader"></i> LIBRARY</a></div>
</div>
<table>
        <tr>
        <th><a class="btn btn-secondary"style="width:100px; heigth:80px;">ID</th>
        <th><a class="btn btn-secondary"style="width:300px; heigth:80px;">TITLE</th>
            <th><a class="btn btn-secondary"style="width:300px; heigth:80px;">AUTHOR</th>
            <th><a class="btn btn-secondary"style="width:200px; heigth:80px;">CATEGORY</th>
            <th><a class="btn btn-secondary"style="width:200px; heigth:80px;">DUEDATE</th>
        </tr> 
        <?php
		$connection=mysqli_connect("remotemysql.com","5XnFWGlHJx","J4BSTJHZaE","5XnFWGlHJx") or die("no connected");
mysqli_select_db($connection,"5XnFWGlHJx") or die("no database");
		session_start();
		$clue=$_SESSION['email'];
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT id,name,author,category,duedate from bag WHERE email='$clue'";
		$result= $connection-> query($sql);
		$i=1;
		$f=0;
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				?>
				<tr>
					
					<td><a class="btn btn-info"style="width:100px; heigth:50px;"><b><?php echo $row['id']; ?> </b></td>
					<td><a class="btn btn-info"style="width:300px; heigth:50px;"><b><?php echo $row['name']; ?> </b></td>
					<td><a class="btn btn-info"style="width:300px; heigth:50px;"><b><?php echo $row['author']; ?> </b></td>
					<td><a class="btn btn-info"style="width:200px; heigth:50px;"><b><?php echo $row['category']; ?> </b></td>
                    <td><a class="btn btn-info"style="width:200px; heigth:50px;"><b><?php echo $row['duedate']; ?> </b></td>
					<td><b><a class="btn btn-danger"style="width:150px; heigth:50px;" href="bag.php?name=<?php echo $row['name'] ?>"> RETURN BOOK </a></b></td>
				</tr>
			<?php
			$i++;
			}
			echo "</table>";
		}
		else{
			$f=1;
		}
		if(isset($_GET['name'])){
			$name=$_GET['name'];
			$sql = "SELECT id,name,author,category from bag WHERE email='$clue'";
			$result= $connection-> query($sql);
			$row = $result-> fetch_assoc();
			$id=$row['id'];
			$name1=$row['name'];
			$author=$row['author'];
            $category=$row['category'];
			$status="Available";
			$b="INSERT INTO books(Id,Title,Author,Category,action) VALUES ('$id','$name1','$author','$category','$status')";
			$query=mysqli_query($connection,$b);
			$del="DELETE FROM bag WHERE email='$clue'";
			$query=mysqli_query($connection,$del);
			if($query){
				echo '<script>alert("Book is returned Successfully!!!")</script>';
				header("Refresh:0;url=bag.php");

			}
		}
		?>
	</table>
	<br><br>
	<?php 
	if($f==1){
		echo "Bag is empty";
	}
	?>
</div>
</table>
</body>
</html> 
