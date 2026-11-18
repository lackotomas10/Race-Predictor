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
            $time1 = $hour * 3600 + $mint * 60 + $secs ;
            $distances = [1,2,3,5,10,21.09,42.19]; // indexy začínají na 0
            $result = [];
            for ($i = 0; $i < count($distances); $i++){
                $result[$i] = $time1 * ($distances[$i]/$dist) ** 1.06;
                if ($result[$i] >= 3600){
                    $resulthour = intdiv($result[$i], 3600);
                    $result[$i] = $result[$i] - $resulthour*3600;
                    
                }
                else{
                    $resulthour = "00";
                }
                $resultmint = intdiv($result[$i], 60);
                $resultsecs = $result[$i] % 60;
                $resultmint = intdiv($result[$i], 60);
                $resultsecs = $result[$i] % 60;
                // Doplnění nul na 2 znaky zleva pomocí str_pad
                $h = str_pad((string) $resulthour, 2, "0", STR_PAD_LEFT);
                $m = str_pad((string) $resultmint, 2, "0", STR_PAD_LEFT);
                $s = str_pad((string) $resultsecs, 2, "0", STR_PAD_LEFT);

                echo $distances[$i] . " km: " . $h . ":" . $m . ":" . $s . "<br>";;
            }

            
      
        }
        ?>
    </h4>
</body>
</html>