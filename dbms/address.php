

 <html>
<head>
<title>address</title>
</head>
<style>
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
<body background="address.jpg">
<form action="tables.html" method="post">
    

<p> 
    <input type="submit" name="submit" value="Back" />
</p>
    </form>
	
<form action="addressadd.php" method="post">
    

<p> 
    <input type="submit" name="submit" value="Add" />
</p>
    
</form>
<form action="addressdelete.php" method="post">
    
   
<p>
    <input type="submit" name="submit" value="Delete" />
</p>
    
</form>
  
   

<?php
// Get a connection for the database
require_once('../mysqli_connection.php');

// Create a query for the database
$query = "SELECT address_id, city, street FROM address";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8" border="1">

<tr>
<td align="left"><b>Address_id</b></td>
<td align="left"><b>City</b></td>
<td align="left"><b>Street</b></td>
 
</tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['address_id'] . '</td><td align="left">' . 
$row['city'] . '</td><td align="left">' .
$row['street'] . '</td>'   ;

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