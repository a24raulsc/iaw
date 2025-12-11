<?php
    if (isset($_GET['enviar'])) {
        $usuario= $_GET['usuario'];
        $passwd = $_GET['passwd'];
        $mail  = $_GET['mail'];
        setcookie("usuario", $usuario, time() + 500); 
        setcookie("passwd", $passwd, time() + 500); 
        setcookie("mail", $mail, time() + 500); 
        header("Location: cookieArray.php");
    }

    if (isset($_GET['borrar'])) {
        foreach ($_COOKIE as $key => $value) {
            if ($key == $_GET['borrar']){
                setcookie($key, $value, 1); 
                header("Location: cookieArray.php");
            }
        }
    }


    foreach ($_COOKIE as $key => $value) {
        echo "<p>Cookie: $key</p>";
        echo "<p>Valor: $value </p>";
        echo "<form action='cookieArray.php' method='get'>
                <button type='submit' name='borrar' value=" . $key . ">Borrar Cookies</button>
              </form>";
        echo str_repeat("-", 30);   
    }

    
    
?>