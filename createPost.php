<?php
include 'db.php';

$user_id = $_POST['user_id'];
$content = $_POST['content'];
$image = $_FILES['image']['name'];

// Save the image to the server
if ($image) {
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
}

$sql = "INSERT INTO posts (user_id, content, image) VALUES ('$user_id', '$content', '$image')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
