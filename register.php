<!DOCTYPE html>
<html>
<body>
<style>
.error{color: #FF0000;}
</style>
<?php
$Username = $Name = $Email = $Password = $Dob = $Gender = "";
$Usernameerr = $Emailerr = $Passworderr = $Nameerr = $Doberr = $Gendererr = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST["Name"])){
		$Nameerr = "Name cannot be empty";
	}else{
		$Name = test_input($_POST["Name"]);
	}
	if(empty($_POST["Dob"])){
		$Doberr = "Enter a valid date";
	}else{
		$Dob = test_input($_POST["Dob"]);
	}
	if(empty($_POST["Username"])){
		$Usernameerr = "Invalid username";
	}else{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "mydb";
		$conn = new mysqli($servername,$username,$password,$database);
		if($conn-> connect_error){
			die("connection failed".mysqli_connect_error());
		}else{
			$stmnt = $conn->prepare("Select * from register where Username = ?");
			$stmnt->bind_param("s",$_POST["Username"]);
			$stmnt->execute();
			$result = $stmnt->get_result();
			if($result->num_rows>0){
				$Usernameerr = "Username already exist";
				$Username = "";
			}else{
				$Username = test_input($_POST["Username"]);
			}
	}
	$stmnt->close();
	$conn->close();
	}
	if(empty($_POST["Email"])){
		$Emailerr = "Invalid E-mail";
	}else{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "mydb";
		$conn = new mysqli($servername,$username,$password,$database);
		if($conn-> connect_error){
			die("connection failed".mysqli_connect_error());
		}else{
			$stmnt = $conn->prepare("Select * from register where Email = ?");
			$stmnt->bind_param("s",$_POST["Email"]);
			$stmnt->execute();
			$result = $stmnt->get_result();
			if($result->num_rows>0){
				$Emailerr = "Email already registered";
				$Email = "";
			}else{
				$Email = test_input($_POST["Email"]);
			}
			$stmnt->close();
			$conn->close();
		}
	}
	if(empty($_POST["Gender"])){
		$Gendererr = "Mention you Gender";
	}
	else{
		$Gender = $_POST["Gender"];
	}
	if(empty($_POST["Password"])){
		$Passworderr = "Invalid Password";
	}else{
		if($_POST["Password"] == $_POST["conf_pass"]){
			$Password = test_input($_POST["Password"]);
			register($Username,$Name,$Email,$Gender,$Password,$Dob);
		}else{
			$Passworderr = "Password does not match";
		}
	}
}
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
function register($Username,$Name,$Email,$Gender,$Password,$Dob){
	if(!$Name == "" && !$Username = "" && !$Email == "" && !$Gender == "" && !$Password == "" && !$Dob == ""){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "mydb";
	$conn = new mysqli($servername,$username,$password,$database);
	if($conn-> connect_error){
		die("connection failed".mysqli_connect_error());
	}else{
		$stmnt = $conn->prepare("insert into register (Name,Username,Email,dob,password,Gender) values (?,?,?,?,?,?)");
		$stmnt->bind_param("ssssss",$Name,$Username,$Email,$Dob,$Password,$Gender);
		$stmnt->execute();
		$stmnt->close();
		
	//	$sql = $conn->prepare("insert into login (Username,password) select Username,password from register where Username = ?");
	//	$sql->bind_param("s",$Username);
	//	$sql->execute();
	//	$sql->close();
		$conn->close();
		
		
	}
}
}

?>

<h1>REGISTER</h1>
<form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">
&nbsp&nbsp&nbsp&nbspName:<input type = "text" name = "Name">&nbsp&nbsp <span class = "error"><?php echo $Nameerr;?></span><br><br>
Username:<input type = "text" name = "Username">&nbsp&nbsp <span class = "error"><?php echo $Usernameerr;?></span><br><br>
&nbsp&nbspE-mail:<input type = "Email" name = "Email">&nbsp&nbsp <span class = "error"><?php echo $Emailerr;?></span><br><br>
Birthdate:<input type = "date" name = "Dob">&nbsp&nbsp <span class = "error"><?php echo $Doberr;?></span><br><br>
Password:<input type = "Password" name = "Password">&nbsp&nbsp <span class = "error"><?php echo $Passworderr;?></span><br><br>
Confirm Password:<input type = "password" name = "conf_pass"><br><br>
Gender:
<input type = "radio" name = "Gender" value ="Male">Male
<input type = "radio" name = "Gender" value = "Female">Female<br><br>
<input type = "submit" value = "Sign Up" name = "submit">
</form>

</body>
</html>
