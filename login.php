<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
.error{color:#FF000;}
</style>
<body>
<form  action = "<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method = post>
Username: <input type = "text" name = "Username">
&nbsp&nbsp&nbspPassword: <input type = "password" name = "password">
<input type = "Submit" value = "Login" name = "submit">
</form>
<?php
$nameerr = $passerr = "";
$password = $Username = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["Username"])){
		$nameerr = "Invalid Username";
		echo "<br> $nameerr";
	}
	else{
		$Username = test_input($_POST["Username"]);
	}
	if(empty($_POST["password"])){
		$passerr = "Incorrect password";
		echo "<br> $passerr";
	}
	else{
		$password = test_input($_POST["password"]);
		login($Username,$password);
	}

}
function login($Username,$pass){
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";
$conn = new mysqli($servername,$username,$password,$database);
if($conn-> connect_error){
die("connection failed".mysqli_connect_error());
}
else{
	$stmnt = $conn->prepare("Select * from register where Username = ?");
	$stmnt-> bind_param('s',$Username);
	$stmnt->execute();
	$result = $stmnt->get_result();
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
		if($pass == $row["password"]){
			$_SESSION['Username'] = $username;
			header("location:profile.php");
		}
		else{
			die("wrong password");
		}
		}
	}else
	echo "<span class ='error'><br>Username and password do not match</span>";
}
}
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}?>
</body>
</head>
</html>
