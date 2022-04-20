<?php
include 'db.php';

if (isset($_POST['add_student'])) {
    $stuname = $_POST['sname'];
    $sturegno = $_POST['sregno'];
    $stuemail = $_POST['semail'];
    $studob = date('Y-m-d', strtotime($_POST['sdob']));
    $stuaddress = $_POST['saddress'];
    $studepartment = $_POST['sdepartment'];
    $stumobile = $_POST['smobile'];
    $stuusername = $_POST['suname'];
    $stupassword = $_POST['supass'];

    $sql = "INSERT INTO student (Student_Name,Reg_No,Email,DOB,Address_details,Branch,Mobile,username)
    VALUES ('$stuname', '$sturegno', '$stuemail', '$studob', '$stuaddress', '$studepartment', '$stumobile', '$stuusername');

    INSERT INTO login (username,password)
    VALUES ('$stuusername','$stupassword')";

    $result = $conn->multi_query($sql);
    if ($result) {
        $_SESSION['addstudentmsg'] = "Student Added Successfully";
        header("Location:../Librarian/AddStudent.php");
    } else {
        $_SESSION['addstudentmsg'] = "No Student Added";
        header("Location:../Librarian/AddStudent.php");
    }
}
