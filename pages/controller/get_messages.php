<?php
$mysqli = new mysqli("localhost", "root", "", "chat_schema");

$result = $mysqli->query("SELECT * FROM chat_messages ORDER BY timestamp ASC");
$messages = [];

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode($messages);
?>
