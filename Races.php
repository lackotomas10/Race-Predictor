<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Race predictor</h1>
    <?php
    $db = new PDO("sqlite" . __DIR__ ."Races.sql"); //Připojí k databázi
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // hlácí chyby

    ?>
    
</body>
</html>