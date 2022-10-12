<html>
<body>
<h1> Registration Form: <br></h1>

<style>

body {background-image: url(https://img.freepik.com/premium-vector/abstract-dynamic-blue-orange-background_67845-1390.jpg?w=2000);background-color: #cccccc; background-size: cover;}
h1   {font-family: verdana; font-size: 300%; align-items: center;}
button {color:red; font-size:200%;}
form   {color: purple;font: times;font-family: cursive;font-size: 160%;background-color:powderblue;padding:10px;width:fit-content;}
.error{color:red;font-size: 60%;font-family: default;}
</style>

<form method="post" action ="insert.php">
<?php // <form action="form.php" method="post"> action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);" ?>
<?php

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

?>
<?php if(!($nameErr ==""&&$userNameErr==""&&$passwordErr==""&& $emailErr =="" && $numberErr=="" && $idErr ==""&&$addressErr==""&&$cvErr==""&&$dateErr== "")){
  die("Errors found");
}?>


Name: <input type="text" name="name"><span class="error">* <?php echo $nameErr;?></span><br>
Username:<input type="text" name="user-name"><span class="error">* <?php echo $userNameErr;?></span><br>
Password:<input type="password" name="password"><br>
E-mail: <input type="email" name="email"><span class="error">* <?php echo $emailErr;?></span><br>
Phone Number: <input tel="text" name="phone_no"><span class="error">* <?php echo $numberErr;?></span><br>
National ID: <input type="id" name="ID"maxlength="14"><br>
Address: <input type="text" name="address"><br>
Date of birth: <input type="date" name="DOB"min="1-1-1970" max="21-9-2005"><span class="error">* <?php echo $dateErr;?></span><br>
Salary: <input type="number"name="salary"min=1000 max=10000><br>
CV: <input type="file" name="cv"><br><br>

<input type="submit" style="height:60px; width:110px; background-color:pink;font-size:120%;font-family:times; align-content: center;"} />

<input type="reset"style="height:60px; width:110px; background-color:pink;font-size:120%;font-family:times; align-content: center;">

</form>
<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }?>
 
</body>
</html>