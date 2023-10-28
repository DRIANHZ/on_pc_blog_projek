<?php
require "../function/koneksi.php";
require "../function/fungsi.php";

session_start();
echo $_SESSION['username'];


$query = mysqli_query($koneksi, "SELECT * FROM `categories`");

$_SESSION["password"];
$cari_user_id = mysqli_query($koneksi, "SELECT * FROM `users` WHERE `password` = '$_SESSION[password]'");
$tampil_name = mysqli_fetch_assoc($cari_user_id);

if(isset($_POST['post'])){
    $uniqueString = uniqid();
    $post_id = crc32($uniqueString);
    $created_at = date("Y-m-d", time());

    $title = $_POST["title"];
    $content = $_POST["content"];
    $category_id = $_POST["category"];
    $image_url = $_POST["image_url"];
    $user_id = $tampil_name["user_id"];

    posting_content("INSERT INTO `posts` (`post_id`, `title`, `content`, `user_id`, `category_id`, `image_url`, `created_at`, `update_at`) VALUES ('$post_id', '$title', '$content', '$user_id', '$category_id', '$image_url', '$created_at', '$created_at');");
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<form action="" method="post">

<table>
    <tr>
        <td>title</td>
        <td><input type="text" name="title"></td>
    </tr>
    <tr>
        <td>content</td>
        <td><input type="text" name="content"></td>
    </tr>
    <tr>
        <td>kategori</td>
        <td>
            <select name="category" id="">
                <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                    <option value="<?= $data['category_id'] ?>"><?= $data['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>image</td>
        <td><input type="text" name="image_url"></td>
    </tr>
    <tr>
        <td><input type="submit" value="post" name="post"></td>
    </tr>
</table>
</form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>