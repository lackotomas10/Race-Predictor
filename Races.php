<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race Predictor</title>
    <link rel="stylesheet" href="style.css">
    <?php
        $db = new PDO("sqlite:" . __DIR__ ."Races.sql"); //Připojí k databázi
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // hlácí chyby

        $sql = file_get_contents(__DIR__ . "/Races.sql"); //načte Races.sql
        $db->exec($sql);
    ?>

</head>
<body>
    <h1>Race predictor</h1>
    <h2>Přihlašování do závodů</h2>
    <div class="ZavodDiv">
        <h4>Zavod1</h4>
        <p>popis</p>
        <form action="">
            <label for="">Jméno:</label> <input type="text" name="" id="" required>
            <br>
            <label for="">Preferované startovné číslo:</label> <input type="number" name="" id="">
            <button>přihlásit se</button>
        </form>
        

    </div>
    
    
</body>
</html>