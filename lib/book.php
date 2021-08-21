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
                    <a href="bag.php"><i class="fa fa-shopping-bag"></i>
                    MY BAG</a>
      
        <div class="conabt"><a href='#'><i class="fas fa-book-reader"></i> LIBRARY</a></div>
</div>
<table >
        <tr>
            <th><a class="btn btn-secondary"style="width:100px; heigth:50px;">Id</th>
            <th><a class="btn btn-secondary"style="width:200px; heigth:50px;">TITLE</th>
            <th><a class="btn btn-secondary"style="width:200px; heigth:50px;">AUTHOR</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:50px;">CATEGORY</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:50px;">AVAILABILITY</th>
            <th><a class="btn btn-secondary"style="width:150px; heigth:50px;">ACTION</th>
        </tr> 
        <?php 
session_start();
$clue=$_SESSION['email'];
if(isset($_GET['Id'])){
	$id=$_GET['Id'];
	$a="SELECT * FROM bag";
	$r=$conn->query($a);
	if($r-> num_rows > 0){
		while($ro = $r-> fetch_assoc()){
			if($ro['email']==$clue){
				echo '<script>alert("Sorry!! you can borrow only one book")</script>';
				exit();
			}
		}
	}
	$borrowed_book="SELECT * FROM books WHERE $id=Id";
	$result=$conn->query($borrowed_book);
	$row=$result->fetch_assoc();
	date_default_timezone_set("Asia/kolkata");
	$date=date("Y-m-d");
	$date=date('Y-m-d', strtotime($date. '+15 days'));
	$name=$row['Title'];
	$author=$row['Author'];
    $category=$row['Category'];
	$mycollection="INSERT INTO bag(id,name,author,category,duedate,email) VALUES ('$id','$name','$author','$category','$date','$clue')";
	$query1=mysqli_query($conn,$mycollection);
	$del="DELETE FROM books WHERE $id=Id";
	$query=mysqli_query($conn,$del);
	if($query1){
		echo '<script>alert("The book is added to your Bag")</script>';
		header("Refresh:0;url=bag.php");

	}
}
?>
</body>
</html>

</body>
</html>
