<?php
$host = 'localhost';
$dbname = 'weather_app';
$username = 'root';
$password = '';
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Get the city from the URL query parameter
if (isset($_GET['city'])) {
    $city = $_GET['city'];

    $sql = 'SELECT * FROM weather_reports WHERE city = ? ORDER BY created_at DESC LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$city]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(['message' => 'No data found for this city.']);
    }
} else {
    echo json_encode(['message' => 'City parameter is missing.']);
}
?>
