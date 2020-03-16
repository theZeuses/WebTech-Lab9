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
	<?php
		$pid="";
		if($_SERVER["REQUEST_METHOD"] != "POST"){
			$pid=$_REQUEST['pid'];
			$_SESSION['pid']=$pid;
		}		
		$pid=$_SESSION['pid'];
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
	
    <?php
    	if ($_SERVER["REQUEST_METHOD"] == "POST"){
    		$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "myDB";
			
			if(isset($_POST["name"])&&isset($_POST["quantity"])){
				$name=$_POST["name"];
				$quantity=$_POST["quantity"];
				$pid=$_SESSION['pid'];

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				$sql = "UPDATE MyProducts SET name='$name',quantity=$quantity WHERE pid=$pid";

				if ($conn->query($sql) === TRUE) {
				    header('location:updatesuccessful.php');
	        		exit();
				} else {
				    echo "Error updating record: " . $conn->error;
				}
				$conn->close();
			}			
    	}
    ?>
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
			<h3>Delete Product:</h3>
	<form method="post">          
                <h3>Slected Product:</h3>
                <h4>Product ID:</h4><?php echo $pid; ?> <br>
                <h4>Product Name:</h4><?php echo $name; ?> <br>
                <h4>Quantity:</h4><?php echo $quantity; ?> <br>
                <br>
                Are you sure this product?
        <input type="submit" name="button1"
                class="button" value="Delete" /> <br>
    </form> 
		</div>
	</div>
	<?php
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        function button1() { 
            $pid="";
            $pid=$_SESSION['pid'];
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

            $sql = "DELETE FROM MyProducts WHERE pid=$pid";

            if ($conn->query($sql) === TRUE) {
                header('location:updatesuccessful.php');
	        	exit();
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();

            header('location:welcome2.php');
            exit();
        }
    ?> 
	
	<div class="footer">Copyright:2017</div>
	
</body>
</html>