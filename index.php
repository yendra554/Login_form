<?php
$servername ="localhost";
$username ="root";
$password="";
$dbname="login";

try{

	$conn =new PDO("mysql:host=$servername;
		dbname= $dbname", $username ,$password );
	//using PDO(Php database Object)

	//PDO error
    $conn-> setAttribute(PDO::ATT_ERRMODE. PDO::ERRMODE_EXCEPTION);

    //Login

   $name= $password= $nameErr= $passwordErr= $error="";

  //login validation

 if($_SERVER["REQUEST_METHOD"]=="POST")
   {
   	//check user is empty
   	if(empty(test_input($_POST["name"])))
   	{
        $nameErr ="Enter Username";
   	}else
   	{
   		$name = test_input($_POST["name"]);
   	}
    


 if(empty(test_input($_POST["password"])))
   	{
        $passwordErr ="Enter Password";
   	}else
   	{
   		$name = test_input($_POST["password"]);
   	}

   }


   //validation conform
   if(empty($nameERR)&&empty($password))
   {
   	$stmt =$conn->query("SELECT id FROM 'user' WHERE name='$name' and password='$password';");
   }
   
   if($stmt->excute())
   {
   	if($stmt->rowcount()==1)
   	{
   		session_start();
   		$_SESSION["name"] =$name;
   		header("location: Welcome.php");
   	}else{
   		$error="Username and Password didn't match";
   	}
   }

 }
catch(PDOException $e)
{
 
   echo "Error: " .$e->getMessage();


}

function test($data)
{
	$data= trim($data);
	$data= stripslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body align="center">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])
	?>" method="post">
	   <h1>User Login</h1>
		Username:<input type="text" name="username">
		<br>
		<br>
		Password:<input type="password" name="password">
		<br>
		<br>
		<input type="submit" name="submit" value="Login">
		
	</form>
<?php $conn=null; ?>
</body>
</html>