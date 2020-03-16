<?php
	session_start();
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
		<div align="right">Logged in as <?php echo $_SESSION["name"]; ?>
		</div>	
		<div class="topnav">
			<a href="home_.php">Log Out</a>
		</div>
	</div>
	<div class="container">
		<div class="column1">
			<div class="subhead">
				Account
			</div>
			<div class="sidenav">
			    <a href="dashboard.php">Dashboard</a>
			    <a href="viewprofile.php">View Profile</a>
			    <a href="editprofile.php">Edit Profile</a>
			    <a href="changeprofilepicture.php">Change Profile Picture</a>
			    <a href="changepassword.php">Change Password</a>
			    <a href="home_.php">Log Out</a>
			</div>
			<div class="subhead">
				Product
			</div>
			<div class="sidenav">
			    <a href="viewproductloggedin.php">View Product</a>
			</div>
		</div>
		<div class="column2">
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
				        echo "<tr><td>".$row["pid"]."</td><td>".$row["name"]."</td><td>".$row["quantity"]."</td>"."<td>"."<a href='productdetailslogged.php?pid=".$row['pid']."'>View</a>"."/"."<a href='editproduct.php?pid=".$row['pid']."'>Edit</a>"."/"."<a href='deleteproduct.php?pid=".$row['pid']."'>Delete</a>"."</td></tr>";
				    }
				    echo "</table>";
				} else {
				    echo "0 results";
				}
				$conn->close();
		    ?> 
		</div>
	</div>
	
	<div class="footer">Copyright:2017</div>
	
</body>
</html>