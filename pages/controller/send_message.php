<?php
$mysqli = new mysqli("localhost", "root", "", "chat_schema");

$sender = $_POST['sender'];
$message = $_POST['message'];

$stmt = $mysqli->prepare("INSERT INTO chat_messages (sender, message) VALUES (?, ?)");
$stmt->bind_param("ss", $sender, $message);
$stmt->execute();

echo "Message sent!";
?>
