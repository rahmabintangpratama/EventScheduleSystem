<?php
include "connect.php";
$user_id = (isset($_POST['user_id'])) ? htmlentities($_POST['user_id']) : "";

if (!empty($_POST['delete_administrator_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM user WHERE user_id='$user_id'");
    if ($query) {
        $message = "<script>window.alert('Data has been successfully deleted.')
        window.location='../user'</script>";
    } else {
        $message = "<script>window.alert('Data failed to be deleted.')
        window.location='../user'</script>";
    }
}
echo $message;
?>