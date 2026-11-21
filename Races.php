<?php
// 1. Připojení k SQLite databázi
$db = new PDO("sqlite:" . __DIR__ . "/races.db");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 2. Vytvoření tabulky ze souboru Races.sql
if (file_exists(__DIR__ . "/Races.sql")) {
    $sql = file_get_contents(__DIR__ . "/Races.sql");
    $db->exec($sql);
}

// 3. Zpracování přihlášky po odeslání formuláře
$zprava = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jmeno = trim($_POST["jmeno"] ?? "");
    $zavod = trim($_POST["zavod"] ?? "");
    $startcislo = $_POST["startcislo"] ?? "";

    if ($jmeno !== "" && $zavod !== "" && $startcislo !== "") {
        $stmt = $db->prepare("INSERT INTO runners (jmeno, zavod, startcislo) VALUES (:jmeno, :zavod, :startcislo)");
        $stmt->execute([
            ":jmeno" => $jmeno,
            ":zavod" => $zavod,
            ":startcislo" => (int)$startcislo
        ]);
        $zprava = "Závodník " . htmlspecialchars($jmeno) . " byl úspěšně přihlášen na " . htmlspecialchars($zavod) . "!";
    } else {
        $zprava = "Chyba: Vyplňte prosím jméno i startovní číslo.";
    }
}

// 4. Načtení všech přihlášek pro startovní listinu (seřazeno podle závodu a čísla)
$stmtSelect = $db->query("SELECT jmeno, zavod, startcislo FROM runners ORDER BY zavod ASC, startcislo ASC");
$prihlasky = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race Predictor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Race predictor</h1>
    <h2>Přihlašování do závodů</h2>

    <?php if ($zprava !== ""): ?>
        <p><strong><?= $zprava ?></strong></p>
    <?php endif; ?>

    <div class="ZavodDiv">
        <h4>Zavod1</h4>
        <p>popis</p>
        <form action="" method="POST">
            <input type="hidden" name="zavod" value="Zavod1">

            <label for="jmeno1">Jméno:</label>
            <input type="text" name="jmeno" id="jmeno1" required>
            <br>
            <label for="cislo1">Preferované startovní číslo:</label>
            <input type="number" name="startcislo" id="cislo1" required>
            <br>
            <button type="submit">Přihlásit se</button>
        </form>
    </div>

    <hr>

    <h2>Startovní listina</h2>
    <?php if (empty($prihlasky)): ?>
        <p>Zatím není přihlášen žádný závodník.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Startovní číslo</th>
                    <th>Jméno závodníka</th>
                    <th>Závod</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prihlasky as $radek): ?>
                    <tr>
                        <td><?= htmlspecialchars($radek["startcislo"]) ?></td>
                        <td><?= htmlspecialchars($radek["jmeno"]) ?></td>
                        <td><?= htmlspecialchars($radek["zavod"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
