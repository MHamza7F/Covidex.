<?php
include('db/connection.php');
// Assuming you have already established a PDO database connection

// Prepare the query
$stmt = $con->prepare("SELECT u_email FROM uregister WHERE u_id = :id");

// Bind the parameter
$id = $email;
$stmt->bindParam(':id', $id);

// Execute the query
$stmt->execute();

// Check if the query was successful
if ($stmt) {
    // Fetch the email from the result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $emailFromDatabase = $row['u_email'];

    // Start the session (if not already started)
    session_start();

    // Store the email in a session variable
    $_SESSION['user_email'] = $emailFromDatabase;

    // Free the statement
    $stmt = null;
} else {
    // Handle the case when the query fails
    echo "Error executing the query: " . $stmt->errorInfo()[2];
}

// Rest of your code...
?>
