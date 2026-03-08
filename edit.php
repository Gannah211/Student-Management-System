<?php
include("db.php");

if (isset($_GET['id'])&& is_numeric($_GET['id'])) {

    $id =$_GET['id'];
    $sql= "SELECT * FROM Student WHERE Id = ?";
    $params =array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
}
?>
<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
     $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $Department = $_POST['Department'];


    $query ="UPDATE Student SET Name = ?, Email = ?, Age= ?, Department= ? WHERE Id = ?";

    $params = array($name, $email, $age, $Department , $id);

    $stmt = sqlsrv_query($conn, $query, $params);

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
    <title>Edit Student Data</title>
    <link rel="stylesheet" href="editStyle.css">
</head>
<body style=" background-image: linear-gradient(to right, #403B4A 0%, #E7E9BB 51%, #403B4A 100%);
">
    <h1>Edit Student Data : #ID  <?php echo $row['Id']; ?></h1>
    <div class="center-container">
    <form  method="POST">
        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">

        <label>
            <span>Name</span>
            <input type="text" name="name" value="<?php echo $row['Name']; ?>">
        </label>
        <label>
            <span>Age</span>
            <input type="number" name="age" value="<?php echo $row['Age']; ?>">
        </label>
        <label>
            <span>Email</span>
            <input type="text" name="email" value="<?php echo $row['Email']; ?>">
    </label> 
    <label>
        <span>Department</span>
        <select name="Department" class="input">
            <option value="1" <?php if($row['Department'] == '1') echo 'selected'; ?>>IS</option>
            <option value="2"<?php if($row['Department'] == '2') echo 'selected'; ?>>Os</option>
            <option value="3" <?php if($row['Department'] == '3') echo 'selected'; ?>>Database</option>
            <option value="4" <?php if($row['Department'] == '4') echo 'selected'; ?>>C#</option>
            <option value="5" <?php if($row['Department'] == '5') echo 'selected'; ?>>JAVA</option>
        </select>
    </label>
    <button class="submit" name="update" id="button" style=" display: block;">
        <div  id="button-outer">
    <div  id="button-inner">
    Submit 
   </div>
  </div></button>

    </form>
</div>
    
</body>
</html>