<?php
include '/../../koneksi/db.php';
$result =mysqli_query($conn,'SELECT * FROM messages ORDER BY id by ASC');
$messages = [];
while($row = mysqli_fetch_array($result)){
    $messages[] = $row;
}
echo json_encode($messages);
?>