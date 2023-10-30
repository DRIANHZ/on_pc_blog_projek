<?php

require "../function/koneksi.php";
require "../function/fungsi.php";
session_start();

// $id = $_GET['id'];

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="../image/profile.png" class="card-img-top" alt="Profile Image">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $tampil['username'] ?></h5>
                        <p class="card-text"><?= $tampil['role'] ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="../home/menu.php" class="btn btn-primary btn-sm">Back to Menu</a>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <h2 class="mb-4">Your Posts</h2>
                <div class="list-group">
                    <?php foreach ($posts as $post) : ?>
                        
                    <img src="../image/download (1).jfif" class="img-thumbnail" alt="...">
                        
                        <a href="other_post.php?post_id=<?= $post['post_id'] ?>" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $post['title'] ?></h5>
                                <small><?= $post['created_at'] ?></small>
                            </div>
                            <p class="mb-1"><?= $post['content'] ?></p>
                            <small>Category: <?= $post['category_id'] ?></small>
                            <a href="../function/hapus.php?id=<?= $post['post_id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <a href="./menu.php" class="btn btn-secondary mt-3">Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
