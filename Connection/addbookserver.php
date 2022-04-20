<?php
include 'db.php';

if (isset($_POST['add_book'])) {
    $bookname = $_POST['bname'];
    $bookid = $_POST['bid'];
    $bookdetail = $_POST['bdetail'];
    $bookauthor = $_POST['bauthor'];
    $bookpublication = $_POST['bpublication'];
    $bookquantity = $_POST['bquantity'];
    $bookdepartment = $_POST['bdepartment'];

    $sql = "INSERT INTO books (Book_Name,Book_ID,Details,Author,Publication,Quantity,Branch)
    VALUES ('$bookname', '$bookid','$bookdetail', '$bookauthor', '$bookpublication', '$bookquantity', '$bookdepartment')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['addbookmsg'] = "Book Added Successfully";
        header("Location:../Librarian/AddBook.php");
    } else {
        $_SESSION['addbookmsg'] = "Book Not Added";
        header("Location:../Librarian/AddBook.php");
    }
}
