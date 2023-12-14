<?php
include "connect.php";
$event_id = (isset($_POST['event_id'])) ? htmlentities($_POST['event_id']) : "";

if (!empty($_POST['delete_event_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM event_schedule_data WHERE event_id='$event_id'");
    if ($query) {
        $message = "<script>window.alert('Data has been successfully deleted.')
        window.location='../administratorpage'</script>";
    } else {
        $message = "<script>window.alert('Data failed to be deleted.')
        window.location='../administratorpage'</script>";
    }
}
echo $message;
?>