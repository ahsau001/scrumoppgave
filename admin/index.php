<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles.css">
    <title>Påmeldte på Wolfenstein LAN</title>
</head>
<body>
<main>
    <h1>Påmeldte på Wolfenstein LAN</h1>
    <div class="pretty">
        <?php
        include_once "../DBConnection.inc.php";
        $conn = GetDBConnection();
        $registered = $conn->query("SELECT * FROM registered")->fetch_all(MYSQLI_ASSOC);
        if (empty($registered)) {
            echo "<p>Ingen er registrert</p>";
        } else {
            echo "<table><thead><tr>";
            echo "<th>Fornavn</th>";
            echo "<th>Etternavn</th>";
            echo "<th>Epost</th>";
            echo "</tr></thead><tbody>";
            foreach ($registered as $row) {
                echo "<tr>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
        ?>
    </div>
</main>
</body>
</html>
