<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  // Allow all domains
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Allow specific methods
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow headers

include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieId = $_POST['movieId'];

    // Prepare SQL query to delete the movie
    $sql = "DELETE FROM Movies WHERE MovieID = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $movieId);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Movie deleted successfully"]);
    } else {
        echo json_encode(["error" => "Failed to delete movie"]);
    }

    $stmt->close();
    $conn->close();
}
?>
