<?php

require "../function/koneksi.php";
require "../function/fungsi.php";

$post_id = $_GET['post_id'];

$comments = ambil_semua_data_post("SELECT * FROM `comments` WHERE `post_id` = '$post_id'");
// $comments = ambil_satu_data_post("SELECT * FROM `coments` WHERE `post_id` = '$post_id'");

session_start();
$passUser =  $_SESSION["password"];

$userFinder = ambil_semua_data_users("SELECT * FROM `users` WHERE `password` = '$passUser'");
$user_id = $userFinder['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">orang nya </th>
                <th scope="col">komenya</th>
                <th scope="col">tanggal komen nya</th>
                <th scope="col">delete</th>


            </tr>
        </thead>
        <?php foreach ($comments as $post) : ?>
            <tbody>
                <td scope="col"><?= $post['user_id'] ?></td>
                <td scope="col"><?= $post['content'] ?></td>
                <td scope="col"><?= $post['created_at'] ?></td>
                <?php if ($user_id == $post['user_id']) : ?>
        <td scope="col"><a href="../proses/hapus-comment.php?comment_id=<?= $post['comment_id']?>&post_id=<?= $post_id ?>">delete</a></td>
    <?php else : ?>
        <td scope="col"></td>
    <?php endif; ?>
</tbody>
        <?php endforeach; ?>

        <form action="../proses/tambah_comment.php" method="post">
            <input type="hidden" name="post_id" value="<?= $post_id ?>">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            <input type="text" name="content">
            <input type="submit" name="submit">
        </form>

        <a href="./menu.php">back</a>
</body>

</html>

<?php
?>