<?php
include "connect.php";
$event_date = (isset($_POST['event_date'])) ? htmlentities($_POST['event_date']) : "";
$start_time = (isset($_POST['start_time'])) ? htmlentities($_POST['start_time']) : "";
$end_time = (isset($_POST['end_time'])) ? htmlentities($_POST['end_time']) : "";
$event_name = (isset($_POST['event_name'])) ? htmlentities($_POST['event_name']) : "";
$event_place = (isset($_POST['event_place'])) ? htmlentities($_POST['event_place']) : "";
$note = (isset($_POST['note'])) ? htmlentities($_POST['note']) : "";

if (!empty($_POST['input_event_validate'])) {
    $query = mysqli_query($conn, "INSERT INTO event_schedule_data (event_date,start_time,end_time,event_name,event_place,note) VALUES ('$event_date','$start_time','$end_time','$event_name','$event_place','$note')");
    if ($query) {
        $message = "<script>window.alert('Data has been successfully input.')
        window.location='../administratorpage'</script>";
    } else {
        $message = "<script>window.alert('Data failed to be input.')
        window.location='../administratorpage'</script>";
    }
}
echo $message;
?>