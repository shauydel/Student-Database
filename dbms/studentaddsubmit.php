 
 <html>
<head>
<title>Student</title>
</head>
<style>
 
</style>
<body>

<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['student_id'])){

        // Adds name to array
        $data_missing[] = 'Student ID';

    } else {

        // Trim white space from the name and store the name
        $student_id = trim($_POST['student_id']);

    }
  if(empty($_POST['first_name'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $f_name = trim($_POST['first_name']);

    }

    if(empty($_POST['last_name'])){

        // Adds name to array
        $data_missing[] = 'Last Name';

    } else{

        // Trim white space from the name and store the name
        $l_name = trim($_POST['last_name']);

    }

    if(empty($_POST['dob'])){

        // Adds name to array
        $data_missing[] = 'DOB';

    } else {

        // Trim white space from the name and store the name
        $dob = trim($_POST['dob']);

    }

    if(empty($_POST['address_id'])){

        // Adds name to array
        $data_missing[] = 'Address ID';

    } else {

        // Trim white space from the name and store the name
        $address_id = trim($_POST['address_id']);

    }

    if(empty($_POST['subject_id'])){

        // Adds name to array
        $data_missing[] = 'Subject ID';

    } else {

        // Trim white space from the name and store the name
        $subject_id = trim($_POST['subject_id']);

    }

   
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connection.php');
        
        $query = "INSERT INTO student (student_id , first_name, last_name, dob,
        address_id, subject_id ) VALUES (?, ?, ?,
        ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
       
        
        mysqli_stmt_bind_param($stmt, "isssii", $student_id,$f_name,
                               $l_name, $dob, $address_id, $subject_id);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Student DATA Entered';
            
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
<form action="department.php" method="post">
    

<p> 
    <input type="submit" name="submit" value="Back" />
</p>
    
 
</body>
</html>
