<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $Department = $_POST['Department'];

    $sql ="INSERT INTO Student (Name, Email, Age, Department) VALUES(?, ?, ?, ?)";

    $params = array($name, $email, $age, $Department);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    header("Location: index.php");
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link rel="stylesheet" href="addPAge.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body style=" background-image: linear-gradient(to right, #403B4A 0%, #E7E9BB 51%, #403B4A 100%);
">
 
<h1>Add New Student</h1>
<div class="center-container">
<form class="form" method="POST" action="add.php">
        <label>
            <span>Name</span>
            <input class="input" type="text" placeholder="Enter Name" name="name">
        </label>

        <label>
             <span>Age</span>
            <input class="input" type="number" placeholder="Enter Age" name="age">
        </label>
            
        <label>
            <span>Email</span>
            <input class="input" type="email" placeholder="student@gmail.com" name="email">
        </label> 
            
        <label>
            <span>Department</span>
            <select name="Department" class="input">
                <option value="1">IS</option>
                <option value="2">Os</option>
                <option value="3">Database</option>
                <option value="4">C#</option>
                <option value="5">JAVA</option>
            </select>
            
        </label>
        
        <button class="submit" name="update" id="button" style=" display: block;">
            <div  id="button-outer">
                <div  id="button-inner">
                        Submit 
                </div>
            </div>
        </button>  
</form>
</div>

</body>
</html>