<?php
include "process/connect.php";
$query = mysqli_query($conn, "SELECT * FROM user
ORDER BY username ASC, user_type ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Administrator Management Page
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddAdministrator"> Add
                        Administrator</button>
                </div>
            </div>

            <!-- Modal Add Administrator -->
            <div class="modal fade" id="ModalAddAdministrator" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Aministrator</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="process/input_administrator_process.php"
                                method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Username" name="username" required>
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback">
                                                Enter Username.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput"
                                                placeholder="name@example.com" name="email" required>
                                            <label for="floatingInput">Email</label>
                                            <div class="invalid-feedback">
                                                Enter Email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example"
                                                name="user_type" required>
                                                <option selected hidden value="">User Type</option>
                                                <option value="1">Administrator Only</option>
                                                <option value="2">Contact Person & Administrator</option>
                                            </select>
                                            <label for="floatingInput">User Type</label>
                                            <div class="invalid-feedback">
                                                Choose User Type.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="08xxxxxxxxxx" name="phone_number">
                                            <label for="floatingInput">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingInput"
                                                placeholder="Password" name="password" required>
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_administrator_validate"
                                        value="12345">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Add Administrator -->

            <?php
            foreach ($result as $row) {
                ?>
                <!-- Modal View -->
                <div class="modal fade" id="ModalView<?php echo $row['user_id']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Administrator Detail</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_user.php"
                                    method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput"
                                                    placeholder="Username" name="username"
                                                    value="<?php echo $row['username']; ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Enter Username.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" name="email"
                                                    value="<?php echo $row['email']; ?>">
                                                <label for="floatingInput">Email</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Email.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select disabled class="form-select" aria-label="Default select example"
                                                    required name="user_type" id="">
                                                    <?php
                                                    $data = array("Administrator Only", "Contact Person & Administrator");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['user_type'] == $key + 1) {
                                                            echo "<option selected value = '$key'>$value";
                                                        } else {
                                                            echo "<option value = '$key'>$value";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingInput">User Type</label>
                                                <div class="invalid-feedback">
                                                    Choose User Type.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input disabled type="number" class="form-control" id="floatingInput"
                                                    placeholder="08xxxxxxxxxx" name="phone_number"
                                                    value="<?php echo $row['phone_number']; ?>">
                                                <label for="floatingInput">Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal View -->

                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['user_id']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Administrator</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="process/edit_administrator_process.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="user_id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Username" name="username" required
                                                    value="<?php echo $row['username']; ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Enter Username.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" name="email"
                                                    value="<?php echo $row['email']; ?>">
                                                <label for="floatingInput">Email</label>
                                                <div class="invalid-feedback">
                                                    Enter Email.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example" required
                                                    name="user_type" id="">
                                                    <?php
                                                    $data = array("Administrator Only", "Contact Person & Administrator");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['user_type'] == $key + 1) {
                                                            echo "<option selected value = " . ($key + 1) . ">$value";
                                                        } else {
                                                            echo "<option value = " . ($key + 1) . ">$value";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingInput">User Type</label>
                                                <div class="invalid-feedback">
                                                    Choose User Type.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="08xxxxxxxxxx" name="phone_number"
                                                    value="<?php echo $row['phone_number']; ?>">
                                                <label for="floatingInput">Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="edit_administrator_validate"
                                            value="12345">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['user_id']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Administrator</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="process/delete_administrator_process.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="user_id">
                                    <div class="col-lg-12">
                                        <?php
                                        if ($row['email'] == $_SESSION['login']) {
                                            echo "<div class='alert alert-danger'>You cannot delete your own account!</div>";
                                        } else {
                                            echo "Are you sure you want to delete the administrator with the email <b>$row[email]</b>?";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_administrator_validate"
                                            value="12345" <?php echo ($row['email'] == $_SESSION['login']) ? 'disabled' : ''; ?>>Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Delete -->

                <!-- Modal Reset Password -->
                <div class="modal fade" id="ModalResetPassword<?php echo $row['user_id']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="process/reset_password_process.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['user_id']; ?>" name="user_id">
                                    <div class="col-lg-12">
                                        <?php
                                        echo "Are you sure you want to reset the password of the administrator with the email <b>$row[email]</b> to the system default password, which is <b>password</b>?";
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="reset_password_validate"
                                            value="12345">Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Reset Password -->
                <?php
            }
            if (empty($result)) {
                echo "There is no administrator or contact person data.";
            } else {
                ?>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++; ?>
                                    </th>
                                    <td>
                                        <?php echo $row['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row['user_type'] == 1) {
                                            echo "Administrator Only";
                                        } elseif ($row['user_type'] == 2) {
                                            echo "Contact Person & Administrator";
                                        }
                                        ?>
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalView<?php echo $row['user_id']; ?>"><i
                                                class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalEdit<?php echo $row['user_id']; ?>"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete<?php echo $row['user_id']; ?>"><i
                                                class="bi bi-trash"></i></button>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#ModalResetPassword<?php echo $row['user_id']; ?>"><i
                                                class="bi bi-key"></i></button>
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
