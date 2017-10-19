<?php
if(isset($_GET['retry'])) {
    session_start();
    include 'head.php';
}

$santaclaus = $_SESSION['name'];
$mails = $_SESSION['email'];
$contraints = $_SESSION['contraint'];

$nbPers = count($santaclaus);

$children = [];

do{
    for($i = 0; $i < $nbPers; $i++) {
        do {
            $tirageAuSort = rand(0, $nbPers - 1);
            $children[$i] = $santaclaus[$tirageAuSort];
        } while (($tirageAuSort == $i) || ($santaclaus[$tirageAuSort] === $contraints[$i]));
    }
} while(count($children) != count(array_unique($children)));

$_SESSION['children'] = $children;

echo "<div class='frame'>";

if($_SESSION['seeResult']) {
    echo "<p class='indent'>Résultat du tirage au sort...</p>";
    for($i = 0; $i < $nbPers; $i++) {
        echo '<p>' . $santaclaus[$i] . ' sera le père noël de : ' . $children[$i] . '</p>';
    }
} else { ?>
    <p>Le tirage au sort a bien été fait.</p>
<?php } ?>


<a href="index.php?sorting=1"><button type="button" class="mails_button">Envoyer les mails</button></a><br><br>
<a href="sorting.php?retry=1"><button type="button">Relancer le tirage au sort</button></a>
<a href="index.php?retry=1"><button type="button">Recommencer</button></a>
</div>
