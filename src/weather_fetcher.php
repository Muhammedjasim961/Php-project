<?php
// Set your OpenWeather API key here
$apiKey = '06ba51d3a317168df7191a7a3532011c';
$city = 'London';

// Database connection details
$host = 'localhost';
$dbname = 'new_weather_db';
$username = 'root';
$password = '';
$dsn = "mysql:host={$host};dbname={$dbname}";

// Establish the PDO connection
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connection successful!<br>';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

$apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

// Fetch weather data from OpenWeatherMap API
$response = file_get_contents($apiUrl);
$weatherData = json_decode($response, true);

if ($weatherData && $weatherData['cod'] === 200) {
    $temperature = $weatherData['main']['temp'];
    $humidity = $weatherData['main']['humidity'];
    $description = $weatherData['weather'][0]['description'];

    $sql = 'INSERT INTO weather_reports (city, temperature, humidity, description) VALUES (?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$city, $temperature, $humidity, $description]);

    echo "Weather data for {$city} has been successfully stored.\n";
} else {
    echo "Error: Could not fetch weather data.\n";
}
?>
