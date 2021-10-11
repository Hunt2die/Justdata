<?php
// database instellingen voor de connectie
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "justdata";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// zet de PDO error mode naar exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// bereid de SQL statement voor om in de database toe te voegen en bind de parameters
    $stmt = $conn->prepare("INSERT INTO data (Naam, Email, Telefoon, Onderwerp, Bericht, Bijlage) VALUES (:Naam, :Email, :Telefoon, :Onderwerp, :Bericht, :Bijlage)");
    $stmt->bindParam(':Naam', $Naam);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Telefoon', $Telefoon);
    $stmt->bindParam(':Onderwerp', $Onderwerp);
    $stmt->bindParam(':Bericht', $Bericht);
    $stmt->bindParam(':Bijlage', $Bijlage, PDO::PARAM_LOB);


// zet alles in de database en voert het uit
    $Naam = $_POST["Naam"];
    $Email = $_POST["Email"];
    $Telefoon = $_POST["Telefoon"];
    $Onderwerp = $_POST["Onderwerp"];
    $Bericht = $_POST["Bericht"];
    $Bijlage = $_FILES["Bijlage"]["name"];

    $stmt->execute();

// nadat het in de database is gezet krijg je een melding dat het is gelukt
    echo "<script type= 'text/javascript'>alert('Data is verstuurd!');</script>";

// als er wat mis gaat pakt de PDOExceptionhandler dit op en laat de errormessage zien en verbreekt de verbinding met de database
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>