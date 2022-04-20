<?php
include 'db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $query = "DELETE FROM student WHERE ID='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['smsg'] = "Student Deleted Successfully";
        header("location:../Librarian/StudentReport.php");
    } else {
        $_SESSION['smsg'] = "Failed to Delete Student!";
        header("location:../Librarian/StudentReport.php");
    }
}
