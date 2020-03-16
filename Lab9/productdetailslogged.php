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
		</div>
	</div>
	
	<div class="footer">Copyright:2017</div>
	
</body>
</html>