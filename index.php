<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>App_Météo</title>
</head>
<body>
    <form method="post">
        <label for="city">Entrez le nom de la ville/ pays :</label>
        <input type="text" name="city" id="city">
        <button type="submit">Obtenir la météo</button>
    </form>
<div id="resultat">
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = $_POST['city'];
    $apiKey = '57ccda0798641e237b7babcf4e00758c';
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";
    $data = json_decode(file_get_contents($apiUrl));

    if ($data) {
        $temperatureKelvin = $data->main->temp;
        $temperatureCelsius = $temperatureKelvin - 273.15; 
        $weatherDescription = $data->weather[0]->description;
        echo "La température à $city est de " . round($temperatureCelsius, 2) . " °C. Conditions météorologiques : $weatherDescription";
    } else {
        echo "Impossible de récupérer les données de météo pour $city.";
    }
}
?>
</div>
</body>
</html>


