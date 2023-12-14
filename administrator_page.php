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
            Administrator Page
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddSchedule"> Add
                        Schedule</button>
                </div>
            </div>

            <!-- Modal Add Schedule -->
            <div class="modal fade" id="ModalAddSchedule" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Schedule</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="process/input_process.php" method="POST"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingInput"
                                                placeholder="Date" name="event_date" required>
                                            <label for="floatingInput">Event Date</label>
                                            <div class="invalid-feedback">
                                                Enter Event Date.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" id="floatingInput"
                                                placeholder="Start Time" name="start_time" required>
                                            <label for="floatingInput">Start Time</label>
                                            <div class="invalid-feedback">
                                                Enter Start Time.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" id="floatingInput"
                                                placeholder="End Time" name="end_time" required>
                                            <label for="floatingInput">End Time</label>
                                            <div class="invalid-feedback">
                                                Enter End Time.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Name" name="event_name" required>
                                            <label for="floatingInput">Event Name</label>
                                            <div class="invalid-feedback">
                                                Enter Event Name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Place" name="event_place">
                                            <label for="floatingInput">Event Venue</label>
                                            <div class="invalid-feedback">
                                                Enter Event Venue.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Note" name="note">
                                            <label for="floatingPassword">Note</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_event_validate"
                                        value="12345">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Add Schedule -->

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
                                <th scope="col">Action</th>
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
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['event_id']; ?>"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['event_id']; ?>"><i
                                                    class="bi bi-trash"></i></button>
                                        </div>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="ModalEdit<?php echo $row['event_id']; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Schedule</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="needs-validation" novalidate
                                                            action="process/edit_process.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <input type="hidden" value="<?php echo $row['event_id']; ?>"
                                                                name="event_id">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="date" class="form-control"
                                                                            id="floatingInput" placeholder="Date"
                                                                            name="event_date"
                                                                            value="<?php echo $row['event_date']; ?>" required>
                                                                        <label for="floatingInput">Event Date</label>
                                                                        <div class="invalid-feedback">
                                                                            Enter Event Date.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="time" class="form-control"
                                                                            id="floatingInput" placeholder="Start Time"
                                                                            name="start_time"
                                                                            value="<?php echo $row['start_time']; ?>" required>
                                                                        <label for="floatingInput">Start Time</label>
                                                                        <div class="invalid-feedback">
                                                                            Enter Start Time.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="time" class="form-control"
                                                                            id="floatingInput" placeholder="End Time"
                                                                            name="end_time"
                                                                            value="<?php echo $row['end_time']; ?>" required>
                                                                        <label for="floatingInput">End Time</label>
                                                                        <div class="invalid-feedback">
                                                                            Enter End Time.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            id="floatingInput" placeholder="Name"
                                                                            name="event_name"
                                                                            value="<?php echo $row['event_name']; ?>" required>
                                                                        <label for="floatingInput">Event Name</label>
                                                                        <div class="invalid-feedback">
                                                                            Enter Event Name.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            id="floatingInput" placeholder="Place"
                                                                            name="event_place"
                                                                            value="<?php echo $row['event_place']; ?>">
                                                                        <label for="floatingInput">Event Venue</label>
                                                                        <div class="invalid-feedback">
                                                                            Enter Event Venue.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control"
                                                                            id="floatingInput" placeholder="Note" name="note"
                                                                            value="<?php echo $row['note']; ?>">
                                                                        <label for="floatingPassword">Note</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="edit_event_validate" value="12345">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Edit -->

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="ModalDelete<?php echo $row['event_id']; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Event</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="needs-validation" novalidate
                                                            action="process/delete_process.php" method="POST">
                                                            <input type="hidden" value="<?php echo $row['event_id']; ?>"
                                                                name="event_id">
                                                            <div class="col-lg-12">
                                                                Are you sure you want to delete
                                                                <b>
                                                                    <?php echo $row['event_name']; ?>
                                                                </b>event?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger"
                                                                    name="delete_event_validate" value="12345">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Delete -->

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
