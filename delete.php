<?php
include("db.php");

if (isset($_GET['id'])&& is_numeric($_GET['id'])) {

   $id =$_GET['id'];

    $delQuery ="DELETE FROM Student WHERE Id = $id";

    $stmt = sqlsrv_query($conn, $delQuery);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    header("Location: index.php");
    exit();
}
?>