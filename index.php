<?php
include_once "DBConnection.inc.php";
$conn = GetDBConnection();
if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    try {
        $stmt = $conn->prepare("INSERT INTO registered (first_name, last_name, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $firstName, $lastName, $email);
        $stmt->execute();
        $stmt->close();

        $message = "Registrering vellykket";
    } catch (Exception $exception) {
        if ($exception->getCode() === 1062) {
            $message = "Du er allerede registrert";
        } else {
            error_log(print_r($exception, true));
            $message = "Noe gikk galt prøv igjen senere";
        }
    }
}
$conn->close();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Wolfenstein LAN påmelding</title>
</head>
<body>
<main>
    <h1>Wolfenstein LAN påmelding</h1>
    <form method="post">
        <label for="firstName">Fornavn</label>
        <input type="text" id="firstName" name="firstName" maxlength="50">
        <label for="lastName">Etternavn</label>
        <input type="text" id="lastName" name="lastName" maxlength="50">
        <label for="email">Epost</label>
        <input type="email" id="email" name="email" maxlength="255">
        <p>Du kan ikke melde deg av</p>
        <button type="submit">Meld deg på</button>
        <?php
        if (!empty($message)) {
            echo "<p>$message</p>";
        }
        ?>
    </form>
</main>
</body>
</html>