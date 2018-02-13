 
 <html>
<head>
<title>subject</title>
</head>
<style>
 
</style>
<body>

<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['subject_id'])){

        // Adds name to array
        $data_missing[] = 'subject ID';

    } else {

        // Trim white space from the name and store the name
        $subject_id = trim($_POST['subject_id']);

    }
  if(empty($_POST['subject_name'])){

        // Adds name to array
        $data_missing[] = 'Subject Name';

    } else {

        // Trim white space from the name and store the name
        $subject_name = trim($_POST['subject_name']);

    }

    if(empty($_POST['department_id'])){

        // Adds name to array
        $data_missing[] = 'Department ID';

    } else{

        // Trim white space from the name and store the name
        $department_id = trim($_POST['department_id']);

    }

  

   
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connection.php');
        
        $query = "INSERT INTO subject (sub_id , sub_name, department_id ) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
       
        
        mysqli_stmt_bind_param($stmt, "isi", $subject_id,$subject_name,
                               $department_id);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Subject DATA Entered';
            
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
<form action="subject.php" method="post">
    

<p> 
    <input type="submit" name="submit" value="Back" />
</p>
    
 
</body>
</html>