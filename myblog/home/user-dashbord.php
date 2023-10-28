<?php

require "../function/koneksi.php";
require "../function/fungsi.php";
session_start();

$id = $_GET['id'];

echo $_SESSION['username'];
$password =  $_SESSION['password'];


if (!$_SESSION) {
    header("location:login.php");
} elseif ($_SESSION['username'] == 'ADMIN') {
    header("location:admin-page.php");
}

$tampil = ambil_semua_data_users("SELECT * FROM `users` WHERE `password` = '$password'");
$posts = ambil_semua_data_post("SELECT * FROM `posts` WHERE `user_id` = '$tampil[user_id]' ");
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

<div class="card" style="width: 18rem;">
  <img src="../image/profile.png" class="card-img-top" alt="...">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $tampil['username'] ?></li>
    <li class="list-group-item"><?= $tampil['user_id'] ?></li>
    <li class="list-group-item"><?= $tampil['role'] ?></li>
  </ul>
  <div class="card-body">
    <a href="../home/menu.php" class="card-link">kembali ke menu</a>
  </div>
</div>    



    <table class="table">
        <thead>
            <tr>
                <th scope="col">post_id</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">userId</th>
                <th scope="col">kategori</th>
                <th scope="col">image</th>
                <th scope="col">created</th>
                <th scope="col">adited</th>
                <th scope="col">aksi</th>


            </tr>
        </thead>
        <?php foreach ($posts as $post) : ?>
            <tbody>
                <td scope="col"><?= $post['post_id'] ?></td>
                <td scope="col"><?= $post['title'] ?></td>
                <td scope="col"><?= $post['content'] ?></td>
                <td scope="col"><?= $post['user_id'] ?></td>
                <td scope="col"><?= $post['category_id'] ?></td>
                <td scope="col"><?= $post['image_url'] ?></td>
                <td scope="col"><?= $post['created_at'] ?></td>
                <td scope="col"><?= $post['update_at'] ?></td>
                <td scope="col">
                <a href="../function/hapus.php?id=<?= $post['post_id'] ?>">hapus</a> | 
                <a href="ubah.php?id=<?= $post['post_id'] ?>">edit</a>
                </td>


            </tbody>
        <?php endforeach; ?>
    </table>




    <a href="./menu.php">back</a>
</body>

</html>