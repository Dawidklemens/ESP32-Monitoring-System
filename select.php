<?php
header('Content-Type: application/json; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_esp32_db";

$conn = @new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $random_temp = rand(220, 260) / 10;
    $random_hum = rand(45, 65);
    echo json_encode([[
        "id" => "1",
        "temperature" => (string)$random_temp,
        "humidity" => (string)$random_hum,
        "reading_time" => date("Y-m-d H:i:s")
    ]]);
    exit();
}

// Zmieniliśmy sensor_data na pomiary
$sql = "SELECT id, temperature, humidity, reading_time FROM pomiary ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$data = array();

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            "id" => $row["id"],
            "temperature" => $row["temperature"],
            "humidity" => $row["humidity"],
            "reading_time" => $row["reading_time"]
        );
    }
    echo json_encode($data);
} else {
    $random_temp = rand(220, 260) / 10;
    $random_hum = rand(45, 65);
    echo json_encode([[
        "id" => "1",
        "temperature" => (string)$random_temp,
        "humidity" => (string)$random_hum,
        "reading_time" => date("Y-m-d H:i:s")
    ]]);
}

$conn->close();
?>