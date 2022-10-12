<html>
<body>
<h1> Registration Form: <br></h1>

<style>

body {background-image: url(https://img.freepik.com/premium-vector/abstract-dynamic-blue-orange-background_67845-1390.jpg?w=2000);background-color: #cccccc; background-size: cover;}
h1   {font-family: verdana; font-size: 300%; align-items: center;}
button {color:red; font-size:200%;}
form   {color: purple;font: times;font-family: cursive;font-size: 160%;background-color:powderblue;padding:10px;width:fit-content;}
.error{color:red;font-size: 60%;font-family: default;}
table, th, td { border: 1px solid;}
</style>
<?php
include "connection.php";
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
$rowcount= mysqli_num_rows($result);
echo "<table>"; // start a table tag in the HTML
echo "<tr><th>" .'ID' . "</th><th>" . 'Name' . "</th><th>". 'UserName' . "</th><th>".'Password' . "</th><th>". 'Email' . "</th><th>". 'Phone Number' . "</th><th>". 'National ID' . "</th><th>". 'Address' . "</th><th>". 'Date of Birth'. "</th><th>". 'Salary'. "</th><th>". 'CV' . "</th></tr>";
while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
echo "<tr><td>" .$row['ID'] . "</td><td>" . $row['Name'] . "</td><td>". $row['UserName'] . "</td><td>". $row['Password'] . "</td><td>". $row['Email'] . "</td><td>". $row['Phone Number'] . "</td><td>". $row['National ID'] . "</td><td>". $row['Address'] . "</td><td>". $row['Date of Birth']. "</td><td>". $row['Salary']. "</td><td>". $row['CV'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close($conn); //Make sure to close out the database connection
//var_dump ($result);
?>
</body>
</html>