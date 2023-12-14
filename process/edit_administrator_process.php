<?php
include "connect.php";
$user_id = (isset($_POST['user_id'])) ? htmlentities($_POST['user_id']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$user_type = (isset($_POST['user_type'])) ? htmlentities($_POST['user_type']) : "";
$phone_number = (isset($_POST['phone_number'])) ? htmlentities($_POST['phone_number']) : "";

if (!empty($_POST['edit_administrator_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_num_rows($select) > 0) {
        $message = "<script>window.alert('The entered email has been registered.')
        window.location='../user'</script>";
    } else {
        $query = mysqli_query($conn, "UPDATE user set username='$username', user_type='$user_type', phone_number='$phone_number' WHERE user_id='$user_id'");
        if ($query) {
            $message = "<script>window.alert('Data has been successfully updated.')
            window.location='../user'</script>";
        } else {
            $message = "<script>window.alert('Data failed to be updated.')
            window.location='../user'</script>";
        }
    }
}
echo $message;
?>
