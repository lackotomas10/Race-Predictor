<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race Predictor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Race predictor</h1> <!--přes xampp http://localhost/RacePredictor/Race-Predictor/RacePredictor.php -->

    <form method="post" class="Form">
        <label for="distance">Distance (km):</label>
        <input type="number" name="Dis" value="<?= htmlspecialchars($_POST["Dis"] ?? 5) ?>" required>
        <br><br>

        <label for="minutes">Hours:</label>
        <input type="number" name="Hou" value="<?= htmlspecialchars($_POST["Hou"] ?? 0) ?>" required>
        <br><br>

        <label for="minutes">Minutes:</label>
        <input type="number" name="Min" value="<?= htmlspecialchars($_POST["Min"] ?? 22) ?>" required>
        <br><br>

        <label for="seconds">Seconds:</label>
        <input type="number" name="Sec" value="<?= htmlspecialchars($_POST['Sec'] ?? 30) ?>" required>
        <br><br>

        <button type="submit" name="tlacitko">Predict</button>
    </form>
    
    
    <h2>Results</h2>
    <h4>
        <?php
        if (isset($_POST["tlacitko"])) {
            $dist = $_POST["Dis"] ?? 5; //  ?? Přidá 5 pokud je Dis prázdný
            $hour = $_POST["Hou"] ?? 0;
            $mint = $_POST["Min"] ?? 22;
            $secs = $_POST["Sec"] ?? 5;
            echo "test (vzdálenost): ".htmlspecialchars($dist)."<br>"; // htmlspecialchars() zabezpečí znaky <>&" pro html
      
        }
        ?>
        1km:  <br>
        2km:  <br>
        3km:  <br>
        5km:  <br>
        10km:  <br>
        HM:  <br>
        FM:  <br>

    </h4>
</body>
</html>