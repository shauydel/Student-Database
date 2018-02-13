 
 <html>
<head>
<title>Teacher</title>
</head>
<style>
 
</style>
<body>

<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['teacher_id'])){

        // Adds name to array
        $data_missing[] = 'Teacher ID';

    } else {

        // Trim white space from the name and store the name
        $teacher_id = trim($_POST['teacher_id']);

    }
  
     if(empty($_POST['first_name'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $first_name = trim($_POST['first_name']);

    }
     if(empty($_POST['last_name'])){

        // Adds name to array
        $data_missing[] = 'Last Name';

    } else {

        // Trim white space from the name and store the name
        $last_name = trim($_POST['last_name']);

    }
  
    if(empty($data_missing)){
        
        require_once('../mysqli_connection.php');
        
        $query = "UPDATE teacher 
set first_name=?,last_name=?
WHERE teacher_id = ?";
        
        $stmt = mysqli_prepare($dbc, $query);
        
       
        
       mysqli_stmt_bind_param($stmt, "ssi", $first_name,$last_name, $teacher_id);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Teacher Name Updated FOR ID: '.$teacher_id. '<br>'.'First Name Updated: '.$first_name.'<br>'.'Last Name Updated: '.$last_name ;
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>
<form action="teacher.php" method="post">
    

<p> 
    <input type="submit" name="submit" value="Back" />
</p>
    
 
</body>
</html>