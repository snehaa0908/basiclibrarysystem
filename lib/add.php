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
	<a href="indexbook.php"><i class="fas fa-address-book"></i>
                    BOOKS</a>
       <a href="index1.php"><i class="fas fa-home"></i>
                HOME</a> 
              
        <div class="conabt"><a href='#'><i class="fas fa-book-reader"></i> LIBRARY</a></div>
</div>
<img src="add1.jpg" width="100%" height="10%" />
<div class="container">
		<div class="header">
			<h2>Add Books</h2>
		</div>
		<form action="add.php" method="post">
			<div>
            <i class="btn btn-info"style="width:200px; heigth:50px;><label for="Bookid">Book Id : </label></i>
				<input type="text" name="Id" required=""><br>
			</div>

			<div>
            <i class="btn btn-info"style="width:200px; heigth:50px;><label for="bname">Book Name : </label></i>
				<input type="text" name="Title" required="">
			</div>

			<div>
			<i class="btn btn-info"style="width:200px; heigth:50px;><label for="author">Author : </label></i>
				<input type="author" name="Author" required="">
			</div>
            <div>
			<i class="btn btn-info"style="width:200px; heigth:50px;><label for="category">Category : </label></i>
				<input type="category" name="Category" required="">
			</div>

			<button type="submit" name="submit"> <i class="btn btn-danger"style="width:200px; heigth:50px;">ADD</i> </button>
		</form>
	</div>
</body>

<?php 
$connection=mysqli_connect("remotemysql.com","5XnFWGlHJx","J4BSTJHZaE","5XnFWGlHJx") or die("no connected");
mysqli_select_db($connection,"5XnFWGlHJx") or die("no database");
if(isset($_POST['submit']))
{
	$bookid=$_POST['Id'];
	$name=$_POST['Title'];
	$author=$_POST['Author'];
    $category=$_POST['Category'];
	$status="action";
	$new_book="INSERT INTO books (Id,Title,Author,Category,action) VALUES ('$bookid','$name','$author','$category','$status')";
	$query=mysqli_query($connection,$new_book);
	if($query){
		echo '<script>alert("Book is Added Successfully")</script>';
		header("Refresh:0;url=indexbook.php");
	}
}
?>

</html>
