<?php
define('db', TRUE);
include_once 'components/db.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>System Conventions</title>
    <link type="text/css" rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css" />
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="http://shinait.com/logo.png" alt="" width="100" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="binary.php">Decimal to Binary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="decimal.php">Binary to Decimal</a>
                </li>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>


<div class="container p-5">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <a class="text-white text-decoration-none" href="binary.php">
                <div class="card bg-danger">
                    <div class="card-body">
                        <h2>Decimal to Binary</h2>
                    </div>
            </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a class="text-white text-decoration-none" href="decimal.php">
                <div class="card bg-danger">
                    <div class="card-body">
                        <h2>Binary to Decimal</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a class="text-white text-decoration-none" href="#">
                <div class="card bg-danger">
                    <div class="card-body">
                        <h2>More...</h2>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>


<script src="public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

