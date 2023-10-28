<?php

require "../function/koneksi.php";
require "../function/fungsi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Form Login</h2>
    <form action="" method="POST">
        <table>
            <tr>
                <td for="username">Username:</td>
                <td><input type="text" id="username" name="username" required></td>
            </tr>
            <tr>
                <td for="password">Password:</td>
                <td><input type="text" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="login"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php

if (isset($_POST['submit'])) {

    $users = ambil_semua_data_users("SELECT * FROM `users` WHERE `username` = '$_POST[username]' AND `password` = '$_POST[password]'");

    // foreach ($users as $user ) {
    //     echo $user['username']."<br>";
    // }

    // var_dump($users);
    // die();

    if ($users) {
        if ($users['isAktif'] == 1) {
            session_start();

            // echo ;
            $_SESSION['username'] = $users['username'];
            $_SESSION['role'] = $users['role'];
            $_SESSION['password'] = $users['password'];

            header("location:menu.php");
        } else {
            echo "AKun anda Belum Aktif silahkan buat menghubungi admin";
        }
    }
}
?>

