<?php
include "connect.php";
$event_id = (isset($_POST['event_id'])) ? htmlentities($_POST['event_id']) : "";
$event_date = (isset($_POST['event_date'])) ? htmlentities($_POST['event_date']) : "";
$start_time = (isset($_POST['start_time'])) ? htmlentities($_POST['start_time']) : "";
$end_time = (isset($_POST['end_time'])) ? htmlentities($_POST['end_time']) : "";
$event_name = (isset($_POST['event_name'])) ? htmlentities($_POST['event_name']) : "";
$event_place = (isset($_POST['event_place'])) ? htmlentities($_POST['event_place']) : "";
$note = (isset($_POST['note'])) ? htmlentities($_POST['note']) : "";

if (!empty($_POST['edit_event_validate'])) {
    $query = mysqli_query($conn, "UPDATE event_schedule_data set event_date='$event_date', start_time='$start_time', end_time='$end_time', event_name='$event_name', event_place='$event_place', note='$note' WHERE event_id='$event_id'");
    if ($query) {
        $message = "<script>window.alert('Data has been successfully updated.')
            window.location='../administratorpage'</script>";
    } else {
        $message = "<script>window.alert('Data failed to be updated.')
            window.location='../administratorpage'</script>";
    }
}
echo $message;
?>