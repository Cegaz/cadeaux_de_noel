<?php

$santaclaus = ['nom1', 'nom2', 'nom3', 'nom4', 'nom5', 'nom6', 'nom7'];
$nbPers = count($santaclaus);

$children = [];

// à décommenter seulement quand on souhaite faire l'envoi mail

/* $mails = ['adressemail1', 'adressemail2', 'adressemail3', 'adressemail4', 'adressemail5', 'adressemail6', 'adressemail7'];*/

do{
    for($i = 0; $i < $nbPers; $i++) {
        do {
            $tirageAuSort = rand(0, $nbPers - 1);
            $children[$i] = $santaclaus[$tirageAuSort];
        } while (($i == $tirageAuSort) ||
// adapter fonction des contraintes souhaitées
        ($i == 0 && $tirageAuSort == 1) ||
        ($i == 1 && $tirageAuSort == 0) ||
        ($i == 2 && $tirageAuSort == 3) ||
        ($i == 3 && $tirageAuSort == 2) ||
        ($i == 4 && $tirageAuSort == 5) ||
        ($i == 5 && $tirageAuSort == 4));
    }
} while(count($children) != count(array_unique($children)));

for($i = 0; $i < $nbPers; $i++) {
	echo $santaclaus[$i] . ' sera le père noël de : ' . $children[$i] . '<br>';
}

for($i = 0; $i < $nbPers; $i++) {
    $mail = $mails[$i];
    $message_txt = $santaclaus[$i] . ", c'est l'heure de penser aux cadeaux de Noel !
    Cette année tu seras le Père Noel de : " . $children[$i];
    $message_html = "<html><head><meta charset=\"utf-8\" /></head>
    <body style=\"display:flex;flex-direction:row;\">
	<img src='http://www.rollerhockeyreims.com/wp-content/uploads/2015/12/pere-noel.jpg' width='100px'\">
	<div style=\"margin-left: 15px;\">
	    <h1>" . $santaclaus[$i] . "...</h1>
		<p>C'est l'heure de penser aux cadeaux de Noël !</p>
		<p>Cette année, tu seras le Père Noël de : <span style=\"font-weight:bold\">" . $children[$i] . "</span>.</div></body></html>";

    $boundary = "-----=" . md5(rand());

    $sujet = "cadeaux de noel";

    $header = "From: \"Cecile\"<cecile@gazaniol.fr>\n";
    $header .= "Reply-to: \"Cecile\" <cecile@gazaniol.fr>\n";
    $header .= "MIME-Version: 1.0 \n";
    $header .= "Content-Type: multipart/alternative;\n boundary=\"$boundary\"\n";

    $message = "\n--" . $boundary . "\n";

    $message .= "Content-Type: text/plain; charset=\"UTF-8\"\n";
    $message .= "Content-Transfer-Encoding: 8bit\n";
    $message .= "\n" . $message_txt . "\n";

    $message .= "\n--" . $boundary . "\n";

    $message .= "Content-Type: text/html; charset=\"UTF-8\"\n";
    $message .= "Content-Transfer-Encoding: 8bit\n";
    $message .= "\n" . $message_html . "\n";

    $message .= "\n--" . $boundary . "--\n";
    $message .= "\n--" . $boundary . "--\n";

    if (mail($mail, $sujet, $message, $header)) {
        echo "L'e-mail a bien été envoyé à " . $mail . "<br>";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de mail à " . $mail . "<br>";
    }
}