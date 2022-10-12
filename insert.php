<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
<style>

body {background-image: url(https://img.freepik.com/premium-vector/abstract-dynamic-blue-orange-background_67845-1390.jpg?w=2000);background-color: #cccccc; background-size: cover;}
h3   {font-family: verdana; font-size: 300%; align-items: center;}
button {color:red; font-size:200%;}
form   {color: purple;font: times;font-family: cursive;font-size: 160%;background-color:powderblue;padding:10px;width:fit-content;}
.error{color:red;font-size: 60%;font-family: default;}
</style>
	<center>
		<?php
		
	$data = $_POST;
/*
	if (empty($data['user-name']) ||
		empty($data['password']) ||
		empty($data['email'])) {
		
		die('Please fill all required fields!');
	}*/
	// define variables and set to empty values
$nameErr =$userNameErr=$passwordErr= $emailErr = $numberErr = $idErr =$addressErr=$cvErr=$dateErr= "";
$name =$userName=$password= $email = $number = $id =$address=$cv=$date= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
   if (empty($_POST["user-name"])) {
     $userNameErr = "UserName is required";
   } else {
     $username = test_input($_POST["user-name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9' ]*$/",$username)) {
       $userNameErr = "Only letters,numbers and white space allowed";
     }
   }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
   if (empty($_POST["DOB"]))
   $dateErr = "Date of birth is required";
   if ((floor((time() - strtotime($_POST["DOB"]))/31556926))<18||(floor((time() - strtotime($_POST["DOB"]))/31556926))>60)
   $dateErr = "Allowed only greater than 18 years old and less than 60 years old";
   else $date=$_POST["DOB"];

   if (empty($_POST["phone_no"]))
   $nuberErr = "Phone number is required";
   if((preg_match('/^[0-9]{11}+$/',str_replace(' ', '', $_POST["phone_no"]))))
   $number=$_POST["phone_no"]; 
   else $numberErr = "Invalid Phone Number try again";
   
}
if(!($nameErr ==""&&$userNameErr==""&&$passwordErr==""&& $emailErr =="" && $numberErr=="" && $idErr ==""&&$addressErr==""&&$cvErr==""&&$dateErr== "")){
	die($nameErr .$userNameErr.$passwordErr.$emailErr. $numberErr . $idErr . $addressErr.$cvErr.$dateErr);}
		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "form_sub");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$name = $_REQUEST['name'];
		$user_name = $_REQUEST['user-name'];
		$password = $_REQUEST['password'];
		$address = $_REQUEST['address'];
		$email = $_REQUEST['email'];
		$DOB = $_REQUEST['DOB'];
		$phone_no = $_REQUEST['phone_no'];
		$ID = $_REQUEST['ID'];
		$cv = $_REQUEST['cv'];
		$salary = $_REQUEST['salary'];
		// Performing insert query execution
		// here our table name is college
		
		$sql = "INSERT INTO users VALUES ('','$name',
			'$user_name','$password','$email','$phone_no','$ID','$address','$DOB','$salary','$cv')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Successfully Registered."
				. " Click button "
				. " to view the updated data"."
				</h3>";
				
		
			//echo nl2br("\n$name\n $user_name\n "
				//. "$g\n $address\n $email");
		} 
		
		else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		
		?>
		<?php
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		 }?>
	<button onclick="location.href = 'page.php';" id="myButton" class="float-left submit-button" >View DataBase</button>	 
	</center>
</body>

</html>
