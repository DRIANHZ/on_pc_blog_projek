<?php

require "../function/koneksi.php";
require "../function/fungsi.php";

if (isset($_POST['submit'])) {
    //untuk mengenerate user id :)
    $uniqueString = uniqid();
    $userid = crc32($uniqueString);

    //menampung semua input user ke dalam varible
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    tambah_data_register_user("INSERT INTO `users`(`user_id`, `username`, `email`, `password`, `role`, `isAktif`) VALUES ('$userid','$username','$email','$password','member','1')");
    session_start();
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['role'] = $_POST['role'];
    header("location:menu.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">username</label></td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td><label for="email">email</label></td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="password">password</label></td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>

</body>

</html>
<?php

?>
