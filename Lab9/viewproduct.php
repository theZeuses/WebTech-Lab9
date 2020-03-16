<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="viewproductStyle.css">
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
    	echo "<h3>All Products:</h3>";

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

		$sql = "SELECT * FROM MyProducts";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    echo "<table><tr><th>ProductID</th><th>ProductName</th><th>Quantity</th><th>Action</th></tr>";
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<tr><td>".$row["pid"]."</td><td>".$row["name"]."</td><td>".$row["quantity"]."</td><td>"."<a href='productdetails.php?pid=".$row['pid']."'>View</a>"."</td></tr>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}
		$conn->close();
    ?> 
	
	<div class="footer">Copyright:2017</div>
	
</body>
</html>