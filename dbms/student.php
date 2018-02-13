
 <html>
<head>
<title>Student</title>
</head>
<style>
body{
background-position: center;
    background-repeat: no-repeat;

}
body{
background-size: cover;
}

 table {
    border-collapse: collapse;
	color:red;
	border: 5px solid red;
}
input[type=submit] {
    width: 10em;  height: 2em;
	background:white;
	border: 5px solid red;
}
</style>
<body background="students.jpg">

<form action="tables.html" method="post">
    

<p> 
    <input type="submit" name="submit" value="Back" />
</p>
    </form>
	
</form>
<?php
// Get a connection for the database
require_once('../mysqli_connection.php');

// Create a query for the database
$query = "SELECT student_id, first_name, last_name, dob, address_id, subject_id FROM student";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8" border="1">

<tr>
<td align="left"><b>Student_id</b></td>
<td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>DOB</b></td>
<td align="left"><b>Address_id</b></td>
<td align="left"><b>Subject_id</b></td>
</tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['student_id'] . '</td><td align="left">' . 
$row['first_name'] . '</td><td align="left">' . 
$row['last_name'] . '</td><td align="left">' .
$row['dob'] . '</td><td align="left">' .
$row['address_id'] . '</td><td align="left">' . 
$row['subject_id'] . '</td> ' ;

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>


</body>
</html>
