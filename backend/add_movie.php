<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  // Allow all domains
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Allow specific methods
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow headers

include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $releaseYear = $_POST['releaseYear'];
    $directorId = $_POST['directorId'];

    // Prepare SQL query to insert movie
    $sql = "INSERT INTO Movies (Title, Genre, ReleaseYear, DirectorID)
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $title, $genre, $releaseYear, $directorId);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "Movie added successfully"]);
    } else {
        echo json_encode(["error" => "Failed to add movie"]);
    }

    $stmt->close();
    $conn->close();
}
?>
