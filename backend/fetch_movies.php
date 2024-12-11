<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  // Allow all domains
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Allow specific methods
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow headers

include('db_connection.php');

// Query to fetch movies with director details
$sql = "SELECT Movies.MovieID, Movies.Title, Movies.Genre, Movies.ReleaseYear, Directors.Name AS Director
        FROM Movies
        JOIN Directors ON Movies.DirectorID = Directors.DirectorID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $movies = [];
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
    echo json_encode($movies);
} else {
    echo json_encode(["error" => "No movies found."]);
}

$conn->close();
?>
