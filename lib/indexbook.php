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

<b>TO ADD A BOOK : </b><a class="btn btn-danger"style="width:150px; heigth:50px;" href="add.php"><b><i class="fas fa-hand-point-right"></i> ADD BOOK</b></a>
<table >
        <tr>
            <th><a class="btn btn-secondary"style="width:100px; heigth:50px;">Id</th>
            <th><a class="btn btn-secondary"style="width:300px; heigth:50px;">TITLE</th>
            <th><a class="btn btn-secondary"style="width:300px; heigth:50px;">AUTHOR</th>
            <th><a class="btn btn-secondary"style="width:200px; heigth:50px;">CATEGORY</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:50px;">AVAILABILITY</th>
            
        </tr>
        <?php
		$connection=mysqli_connect("localhost","id17336622_books","Snehaasnehaa123$","id17336622_library");
		mysqli_select_db($connection,"id17336622_library") or die("no database");
		if($connection-> connect_error){
			die("connection failed:". $connection-> connect_error);
		}
		$sql = "SELECT Id,Title,Author,Category,action from books";
		$result= $connection-> query($sql);
		$i=1;
		if($result-> num_rows > 0){
			while($row = $result-> fetch_assoc()){
				?>
				<tr>
					
					<td><a class="btn btn-info"style="width:100px; heigth:50px;"><?php echo $row['Id']; ?> </td>
					<td><a class="btn btn-info"style="width:300px; heigth:50px;"><b><?php echo $row['Title']; ?> </b></td>
					<td><a class="btn btn-info"style="width:300px; heigth:50px;"><b><?php echo $row['Author']; ?> </b></td>
					
					<td><a class="btn btn-info"style="width:200px; heigth:50px;"><b><?php echo $row['Category']; ?> </b></td>
                    
					<td><a class="btn btn-info"style="width:150px; heigth:50px;"><b><?php echo $row['action']; ?> </b></td>
					<td><b><a class="btn btn-danger" href="indexbook.php?Id=<?php echo $row['Id'] ?>"> DELETE </a></b></td>
                    
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
	$del="DELETE FROM books WHERE $Id=Id";
	$query=mysqli_query($connection,$del);
	if($query){
		echo '<script>alert(" Successfully Deleted !!!")</script>';
        header("Refresh:0;url=indexbook.php");

	}
}
?>


</html>