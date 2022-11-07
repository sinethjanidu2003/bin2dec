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

if (!empty($_POST["binary"])){
    $value = $_POST["binary"];
    $firstSelector = $_POST["firstSelect"];
    $secondSelector = $_POST["secondSelect"];

    $functions = new Functions();
    $return = $functions->convertValues($value,$firstSelector,$secondSelector);

    $binary = $return['value'];
    $firstSelector = ucfirst($return['firstSelector']);
    $secondSelector = ucfirst($return['secondSelector']);
}

function storetheResult(){
    if (!empty($_POST["binary"])){
        $binary = $_POST["binary"];
        return $binary;
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
                    <a class="nav-link active" aria-current="page" href="index.php">System Conversions</a>
                </li>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>


<div class="container p-5 col-md-6">

    <div class="card">
        <div class="card-header">

            <?php
            if(!empty($_POST["binary"])){
                echo "<h4>" . $firstSelector . " To " . $secondSelector. "</h4>";
            }else{
                echo '<h4>System Conversions</h4>';
            }
            ?>
        </div>
        <div class="card-body">
            <form id="indexForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST" class="row g-3">

                <div class="row">
                    <div class="col-12 col-md-5">
                        <label class="form-label" for="selectType">Select your conversion  </label>
                        <select class="form-control" name="firstSelect" id="firstSelector" onchange="checkValidation(this,'secondSelector')" >
                            <option value="decimal"> Decimal</option>
                            <option value="binary"> Binary</option>
                            <option value="octal"> Octal</option>
                            <option value="hex"> Hexadecimal</option>

                        </select>

                    </div>
                    <div class="col-12 col-md-5">
                        <label  class="form-label" for="selectType">To</label>
                        <select name="secondSelect" class="form-control" id="secondSelector" onchange="checkValidation(this,'firstSelector')">
                            <option value="decimal"> Decimal</option>
                            <option value="binary"> Binary</option>
                            <option value="octal"> Octal</option>
                            <option value="hex"> Hexadecimal</option>

                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-10">
                        <label for="validationCustom01" class="form-label"><span id="befoConvert">Decimal</span> Value</label>
                        <input type="number" value="<?php echo storetheResult() ?>"  class="form-control" name="binary" id="decimal" required>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary"  type="submit">Convert to <span id="convertBtn">Decimal</span></button>
                    <button class="btn btn-danger" onclick="clearformdecimal()" type="button">Reset</button>
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST"){ ?>
                    <div class="col-12 col-md-10">
                        <label for="validationCustom01" class="form-label"><?php echo $secondSelector?> Value</label>
                        <input type="text" value="<?php echo $binary ?>" class="form-control" id="validationCustom02" readonly>
                    </div>
                    <?php
                }
                ?>
            </form>


        </div>
    </div>
</div>

<script src="public/bootstrap/js/bootstrap.min.js"></script>
<script src="public/js/main.js" type="application/javascript"></script>
<script>
    function checkValidation(e,selector){
        var selectobject = document.getElementById(selector);
        for (var i=0; i<selectobject.length; i++) {
            if (selectobject.options[i].value === e.value){
                selectobject.options[i].disabled = true;
            }else{
                selectobject.options[i].disabled = false;
            }
        }

        document.getElementById('convertBtn').innerHTML = document.getElementById('secondSelector').value;
        document.getElementById('befoConvert').innerHTML = document.getElementById('firstSelector').value;
    }

    function clearformdecimal(){
        window.location.href ="./index.php";
    }
</script>
</body>
</html>

