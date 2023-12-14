<?php
include "connect.php";
$user_id = (isset($_POST['user_id'])) ? htmlentities($_POST['user_id']) : "";

if (!empty($_POST['reset_password_validate'])) {
    $query = mysqli_query($conn, "UPDATE user set password=md5('password') WHERE user_id='$user_id'");
    if ($query) {
        $message = "<script>window.alert('Password has been successfully reset.')
        window.location='../user'</script>";
    } else {
        $message = "<script>window.alert('Password failed to be reset.')</script>";
    }
}
echo $message;
?>