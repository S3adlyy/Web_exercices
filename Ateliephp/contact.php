<?php
if (isset($_GET["send"])) {
    if (empty($_GET["name"])) {
        echo "Add name<br>";
    } else {
        $name = $_GET["name"];
    }

    if (empty($_GET["pre"])) {
        echo "Add first name<br>";
    } else {
        $pre = $_GET["pre"];
    }

    if (empty($_GET["email"])) {
        echo "Add email<br>";
    } else {
        $email = $_GET["email"];
    }

    if (empty($_GET["tel"])) {
        echo "Add a phone number<br>";
    } else {
        $tel = $_GET["tel"];  // Changed $num to $tel
    }

    if (empty($_GET["adr"])) {
        echo "Add address<br>";
    } else {
        $adr = $_GET["adr"];
    }

    if (empty($_GET["code"])) {
        echo "Add postal code<br>";
    } else {
        $code = $_GET["code"];
    }


    if (!empty($name) && !empty($pre) && !empty($email) && !empty($tel) && !empty($adr) && !empty($code)) {
        echo "<table border='1'>";
        echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Tel</th><th>Adresse</th><th>Code Postal</th></tr>";
        echo "<tr>
                <td>$name</td>
                <td>$pre</td>
                <td>$email</td>
                <td>$tel</td>
                <td>$adr</td>
                <td>$code</td>
              </tr>";
        echo "</table>";
    }
}
?>
