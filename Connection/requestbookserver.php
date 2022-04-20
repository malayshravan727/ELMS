<?php
require 'db.php';

$bookid = $_GET['bookid'];
$bookname = $_GET['bookname'];
$bookdetail = $_GET['Details'];
$bookdepartment = $_GET['Branch'];

$username = $_SESSION['studentuser_name'];

$sql = "INSERT INTO requestbook (Book_ID,Student_Name,Date_Time) values ('$bookid','$username', curtime())";

if ($conn->query($sql) === true) {
    $_SESSION['brmsg'] = "Book Requested Successfully.";
    header("location:../Student/RequestBook.php");
} else {
    $_SESSION['brmsg'] = "Book Request Failed!";
    header("location:../Student/RequestBook.php");
}
