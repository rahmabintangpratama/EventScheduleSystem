<?php
include "connect.php";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$user_type = (isset($_POST['user_type'])) ? htmlentities($_POST['user_type']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
$phone_number = (isset($_POST['phone_number'])) ? htmlentities($_POST['phone_number']) : "";

if (!empty($_POST['input_administrator_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($select) > 0) {
        $message = "<script>window.alert('The entered email has been registered.')
        window.location='../user'</script>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO user (username,email,user_type,password,phone_number) VALUES ('$username','$email','$user_type','$password','$phone_number')");
        if ($query) {
            $message = "<script>window.alert('Data has been successfully input.')
        window.location='../user'</script>";
        } else {
            $message = "<script>window.alert('Data failed to be input.')</script>";
        }
    }
}
echo $message;
?>