<?php
define('db', TRUE);
include_once 'components/db.php';
require 'components/functions.php';

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

<?php

if (!empty($_POST["decimal"])){
    $decimal = $_POST["decimal"];
    $binary = decimalToBinary($decimal);
}

function storetheResult(){
    if (!empty($_POST["decimal"])){
        $decimal = $_POST["decimal"];
       return $decimal;
    }
    else{
        return "";
    }
}


?>

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
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="binary.php">Decimal to Binary</a>
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

    <div class="card">
        <div class="card-header">
            <h4>Decimal to Binary</h4>
        </div>
        <div class="card-body">
            <form id="indexForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST" class="row g-3">
                <div class="col-12 col-md-5">
                    <label for="validationCustom01" class="form-label">Decimal Value</label>
                    <input type="number" value="<?php echo storetheResult() ?>" class="form-control" name="decimal" id="decimal" required>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary"  type="submit">Convert to Binary</button>
                    <button class="btn btn-danger" onclick="clearform()" type="button">Reset</button>
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST"){ ?>
                    <div class="col-12 col-md-5">
                        <label for="validationCustom01" class="form-label">Binary Value</label>
                        <input type="number" value="<?php echo strrev($binary) ?>" class="form-control" id="validationCustom02" readonly>
                    </div>
                <?php
                }
                ?>
            </form>


        </div>
    </div>
</div>


<script src="public/bootstrap/js/bootstrap.min.js"></script>
<script src="public/js/main.js"></script>
</body>
</html>
