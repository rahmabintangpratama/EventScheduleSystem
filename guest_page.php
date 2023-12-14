<?php
include "process/connect.php";
$query = mysqli_query($conn, "SELECT * FROM event_schedule_data
ORDER BY event_date ASC, start_time ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Guest Page
        </div>
        <div class="card-body">
            <?php
            if (empty($result)) {
                echo "Event schedule does not exist";
            } else {
                ?>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Name</th>
                                <th scope="col">Venue</th>
                                <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr class="text-nowrap">
                                    <th scope="row">
                                        <?php echo $no++; ?>
                                    </th>
                                    <td>
                                        <?php echo $row['event_date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['start_time']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['end_time']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['event_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['event_place']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['note']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
