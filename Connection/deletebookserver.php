<?php
include 'db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $query = "DELETE FROM books WHERE ID='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['dmsg'] = "Book Deleted Successfully";
        header("location:../Librarian/BookReport.php");
    } else {
        $_SESSION['dmsg'] = "Failed to Delete Book!";
        header("location:../Librarian/BookReport.php");
    }
}
