<?php
session_start();

$santaclaus = $_SESSION['name'];
$children = $_SESSION['children'];
$mails = $_SESSION['email'];
$nbPers = count($santaclaus);

$_SESSION['exped'] = $_POST['exped'];
$_SESSION['mail_exped'] = $_POST['mail_exped'];

include 'head.php';
echo "<div class=frame>";

for($i = 0; $i < $nbPers; $i++) {
    $mail = $mails[$i];
    $message_txt = $santaclaus[$i] . ", c'est l'heure de penser aux cadeaux de Noel !
    Cette année tu seras le Père Noel de : " . $children[$i];
    $message_html = "<html><head><meta charset=\"utf-8\" /></head>
    <body style=\"display:flex;flex-direction:row;\">
    <img src='pere-noel.jpg' width='100px'\">
    <div style=\"margin-left: 15px;\">
    <h1>" . $santaclaus[$i] . "...</h1>
    <p>C'est l'heure de penser aux cadeaux de Noël !</p>
    <p>Cette année, tu seras le Père Noël de : <span style=\"font-weight:bold\">" . $children[$i] . "</span>.</div></body></html>";

    $boundary = "-----=" . md5(rand());

    $sujet = "cadeaux de noel";

    $header = "From: \"" . $_SESSION['exped'] . "\"<" . $_SESSION['mail_exped'] . ">\n";
    $header .= "Reply-to: \"" . $_SESSION['exped'] . "\"" . $_SESSION['mail_exped'] . ">\n";
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
        echo "L'e-mail a bien été envoyé à " . $santaclaus[$i] . " (" . $mail . ").<br>";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de mail à <span>" . $santaclaus[$i] . " (" . $mail . ").</span><br><br>";
    }
}
echo "<a href='index.php'><button type='button'>Recommencer</button></a>";
echo "<div>";
