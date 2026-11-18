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

    <form class="Form">
        <label for="distance">Distance (km):</label>
        <input type="number" id="Dis" value="5" required>
        <br><br>

        <label for="minutes">Hours:</label>
        <input type="number" id="Hours" value="22" required>
        <br><br>

        <label for="minutes">Minutes:</label>
        <input type="number" id="Min" value="22" required>
        <br><br>

        <label for="seconds">Seconds:</label>
        <input type="number" id="Sec" value="30" required>
        <br><br>

        
    </form>
    
    <form class="Form" id="Empty"></form>
    <button>Add more</button>
    <button type="submit">Predict</button>
    <h2>Results</h2>
    <h4>
        <?php 
        echo"Hello world! <br>";
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