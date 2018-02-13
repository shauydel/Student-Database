 
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
  
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connection.php');
        
        $query = "DELETE FROM teacher
WHERE teacher_id = ?";
        
        $stmt = mysqli_prepare($dbc, $query);
        
       
        
        mysqli_stmt_bind_param($stmt, "i", $teacher_id);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Teacher DATA Deleted with ID: '.$teacher_id;
            
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