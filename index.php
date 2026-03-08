<?php
include("db.php");

$sql ="SELECT S.Id,S.Name,S.Email,S.Age,Department.Name AS Department
FROM Student as S 
JOIN Department on S.Department = Department.Id ;";
$stmt = sqlsrv_query($conn, $sql);

if($stmt === false)
    die(print_r(sqlsrv_errors(),true));
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body style=" background-image: linear-gradient(to right, #403B4A 0%, #E7E9BB 51%, #403B4A 100%);">
    <h1>Student Management System</h1>
    <table tyle='border: 1px solid #0000'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        <?php while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {?>
            <tr>
                <td><?php echo $row['Id'];?></td>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Email'];?></td>
                <td><?php echo $row['Age'];?></td>
                <td><?php echo $row['Department'];?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['Id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['Id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                </td>
            </tr>
       <?php }?>
    </table>

    <button type="button" onclick="window.location.href='add.php'" class="button">
        <div class="button-outer">
        <div class="button-inner">
        Add New Student
        </div>
    </div>
    </button>

</body>
</html>