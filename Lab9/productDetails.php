<?php
session_start();
$pid=$_REQUEST['pid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="editprofileStyle.css">
</head>
<body>
	<div class="header">
		<h1>xCompany</h1>
		<div class="topnav">
			<a href="registration.php">Registration</a>
			<a href="login.php">Log In</a>
			<a href="home_.php">Home</a>
			<a href="viewproduct.php">View Product</a>
		</div>
	</div>
	<div><h2>View Product</h2></div>

	<?php
		$name=$quantity="";
	    $servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbname = "myDB";
	    
	    // Create connection
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    // Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    $sql = "SELECT * FROM MyProducts WHERE pid=$pid";
	    $result = $conn->query($sql);

	    if ($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()){
	            $name=$row["name"];
	            $quantity=$row["quantity"];
	        }
	        
	    } else {
	        echo "Error fetching record: " . $conn->error;
	    }
	    $conn->close();
	?>
	<h3>Product Details</h3>
    <h4>Product ID:</h4><?php echo $pid; ?> <br>
    <h4>Product Name:</h4><?php echo $name; ?> <br>
    <h4>Quantity:</h4><?php echo $quantity; ?> <br>
    <br>

	
	<div class="footer">Copyright:2017</div>
	
</body>
</html>