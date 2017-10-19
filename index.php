<?php
session_start();
include 'head.php';

if(isset($_GET['retry'])) {
    session_unset();
}

if(!isset($_POST['form1submit']) && !isset($_POST['form2submit']) && !isset($_POST['form3submit']) && !isset($_GET['sorting'])) {
    include 'form1.php';
} elseif(isset($_POST['form1submit'])) {
    $_SESSION['number'] = $_POST['number'];
    $_SESSION['seeResult'] = $_POST['seeResult'];
    if (is_numeric($_POST['number']) && $_POST['number'] > 1) {
        include 'form2.php';
    } elseif ($_POST['number'] <= 1) {
        echo "Entre un nombre supérieur à un, petit rigolo !";
    } elseif (!is_numeric($_POST['number'])) {
        echo "Entre un nombre, petit malin, sinon ça sert à rien...";
    }
} elseif(isset($_POST['form2submit'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    include 'form3.php';
} elseif(isset($_POST['form3submit'])) {
    $_SESSION['contraint'] = $_POST['contraint'];
    include 'sorting.php';
} elseif(isset($_GET['sorting'])) {
    include 'form4.php';
} ?>

</body>
</html>
