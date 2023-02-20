<?php // todo: сделать один общий header ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SubSpace</title>
    <link rel="stylesheet" href="../template/assets/css/main.css" >
    <link rel="stylesheet" href="../template/assets/css/media.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap&subset=cyrillic,cyrillic-ext,latin-ext"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/a7c8538669.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="header-container">
        <div class="header-logo">
            <a href="#">SubSpace</a>
        </div>
        <div class="header-buttons">
            <div class="header-username"><?= $_SESSION['username'] ?></div>
            <a href="/api/user/logout/">Выйти</a>
        </div>
    </div>
</header>