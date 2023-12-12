<?php
require './config/config.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeTour</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/user.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-2">
        <div class="container-fluid px-5">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item mx-1">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Trang chủ</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link active" aria-current="page" href="introduce.php">Giới thiệu</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link active" aria-current="page" href="manage_person.php">Quản lý</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link active" aria-current="page" href="manage_user.php">Quản lý Người dùng</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link active" aria-current="page" href="manage_book.php">Quản lý Sách</a>
                    </li>
                </ul>
            </div>
        </div>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </nav>