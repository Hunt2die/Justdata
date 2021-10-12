<?php
// mailer werkt niet! heb gezocht naar hoe ik dit kon doen oplossen maar ik ben niet ver gekomen met dit
// De beste oplossing was om de PHPMailer API te gebruiken denk ik

function mail_attachment($Bijlage, $path, $Email, $Naam, $Onderwerp, $Bericht) {
    // adres waar de mail heen moet
    $mailto = "Twan1304@Hotmail.com";

    // voegt de bijlage (PDF bestand) toe aan de mail
    $file = $path.$Bijlage;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);

    // checkt of het geuploade bestand ook een PDF is
    $header = "From: ".$Naam." <".$Email.">\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $Bericht."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$Bijlage."\"\r\n";
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$Bijlage."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";

    // als alles klopt moet dit naar de mail gestuurd worden
    if (mail($mailto, $Onderwerp, "$Bericht", $header, $Bijlage)) {
        echo "<script type= 'text/javascript'>alert('Mail verstuurd');</script>";
    } else {
        echo "<script type= 'text/javascript'>alert('Mail niet verstuurd!');</script>";
    }
}