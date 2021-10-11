<?php
$NaamErr = $EmailErr = $TelefoonErr = $OnderwerpErr = $BerichtErr = "";
$Naam = $Email = $Telefoon = $Onderwerp = $Bericht = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // simpele validator, als een van de required fields leeg is gaat de validator naar false en laat de errormessage zien, data word dan niet geupload
    $valid = true;

    if (empty($_POST["Naam"])) {
        $NaamErr = "Naam is required";
        $valid = false;
    } else {
        $Naam = test_input($_POST["Naam"]);
    }

    if (empty($_POST["Email"])) {
        $EmailErr = "Email is required";
        $valid = false;
    } else {
        $Email = test_input($_POST["Email"]);

        // checkt of het ingevoerde email adres ook een valid email adres is
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $EmailErr = "Invalid email format";
        }
    }

    if (empty($_POST["Telefoon"])) {
        $TelefoonErr = "Telefoon is required";
        $valid = false;
    } else {
        $Telefoon = test_input($_POST["Telefoon"]);
    }

    if (empty($_POST["Onderwerp"])) {
        $OnderwerpErr = "Onderwerp is required";
        $valid = false;
    } else {
        $Onderwerp = test_input($_POST["Onderwerp"]);
    }

    if (empty($_POST["Bericht"])) {
        $BerichtErr = "Bericht is required";
        $valid = false;
    } else {
        $Bericht = test_input($_POST["Bericht"]);
    }

    // file upload handler
    $target_dir = "../Justdata/uploads/";
    $target_file = $target_dir . basename($_FILES["Bijlage"]["name"]);
    $uploadOk = 1;
    $extension = pathinfo($_FILES["Bijlage"]["name"], PATHINFO_EXTENSION);


// dit ziet of een bestand de bestandsextentie van PDF heeft of geen extensie heeft/blanco is. Zo niet dan moet deze de upload stoppen om te voorkomen dat er andere bestandstypen worden geupload
    if ($extension == 'pdf' || $extension == '') {
        $valid = true;
    } else {
        echo "<script type= 'text/javascript'>alert('Het opgegeven bestand is geen pdf!');</script>";
        $valid = false;
    }

    // als alles valid is wordt de insert.php class opgeroepen om de ingevulde data in de database te inserten
    if ($valid) {
        include ("Insert.php");
        exit;
    }
}

// trimt de data van special characters om te voorkomen dat er code kan geupload worden
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}