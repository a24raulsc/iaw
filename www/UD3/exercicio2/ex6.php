<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <?php
        if (is_numeric( $_GET["n1"] ) == true && is_numeric($_GET["n2"]) == true && is_numeric($_GET["n3"]) == true) {
            if (($_GET["n1"]) > ($_GET["n2"])) {
               $maior = ($_GET["n1"]);
            }
            if (($_GET["n1"]) > ($_GET["n3"])) {
               $maior = ($_GET["n1"]);
            }
            if (($_GET["n2"]) > ($_GET["n1"])) {
               $maior = ($_GET["n2"]);
            }
            if (($_GET["n2"]) > ($_GET["n3"])) {
               $maior = ($_GET["n2"]);
            }
            if (($_GET["n3"]) > ($_GET["n1"])) {
               $maior = ($_GET["n3"]);
            }
            if (($_GET["n3"]) > ($_GET["n2"])) {
               $maior = ($_GET["n3"]);
            }
            if (($_GET["n1"]) < ($_GET["n2"])) {
               $menor = ($_GET["n1"]);
            }
            if (($_GET["n1"]) < ($_GET["n3"])) {
               $menor = ($_GET["n1"]);
            }
            if (($_GET["n2"]) < ($_GET["n1"])) {
               $menor = ($_GET["n2"]);
            }
            if (($_GET["n2"]) < ($_GET["n3"])) {
               $menor = ($_GET["n2"]);
            }
            if (($_GET["n3"]) < ($_GET["n1"])) {
               $menor = ($_GET["n3"]);
            }
            if (($_GET["n3"]) < ($_GET["n2"])) {
               $menor = ($_GET["n3"]);
            }
            echo"O maior é " . $maior . "   e o menor é " . $menor;
        }
        else {
            echo"debes proporcionar números";
        }
    ?>
</body>
</html>