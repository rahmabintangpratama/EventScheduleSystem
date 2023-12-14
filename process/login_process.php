<?php
session_start();
include "connect.php";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
if (!empty($_POST['login_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' && password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        $_SESSION['login'] = $email;
        $_SESSION['user_id'] = $hasil['user_id'];
        header('location:../administratorpage');
    } else { ?>
        <script>
            alert("Email atau Password yang anda masukkan salah"); window.location = "../guestpage";
        </script>
        <?php
    }
}
?>