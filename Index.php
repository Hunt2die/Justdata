<?php
include("classes/Validate.php");
include ("classes/Mailer.php");
?>

<html lang="en">

<head>
    <title>Contact Formulier</title>
    <link rel="stylesheet" type="text/css" href="stylen/Index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
</head>

<body>
<form method ="post" enctype="multipart/form-data" class="formContainer" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="container">
        <div class="row">

            <div class="column" style="background-color:#ff435e; color: white">
                <h1>Twan Eikelenboom</h1>
                <P>Dit is de opdracht voor mijn sollicitatie</P>
            </div>

        <div class="column" style="background-color:white;">
            <H1>Neem contact op</H1>
            <input type="text" name="Naam" placeholder="Naam">
                <span class = "error"><?php echo $NaamErr;?></span><br>

            <input type="email" name="Email" placeholder="Email">
                <span class = "error"><?php echo $EmailErr;?></span><br>

            <input type="number" name="Telefoon" placeholder="Telefoon nummer">
                <span class = "error"><?php echo $TelefoonErr;?></span><br>

            <input type="text" name="Onderwerp" placeholder="Onderwerp">
                <span class = "error"><?php echo $OnderwerpErr;?></span><br>

            <textarea name="Bericht" rows="3"></textarea>
                <span class = "error"><?php echo $BerichtErr;?></span><br>

            <input type="file" name="Bijlage" accept="application/pdf" id="actualButton" hidden><br>
            <label for="actualButton">upload bestand</label><br>

            <button class="button2" type="submit" name="submit" value="Verzenden">Verstuur</button>
        </div>
        </div>
    </div>
</form>
</body>
</html>