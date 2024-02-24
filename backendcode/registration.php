<?php

// Define the endpoint for user registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/api/register') {
    // Set the response content type to JSON
    header('Content-Type: application/json');

    // Extract user registration data from the request body
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate user input
    $required_fields = ['username', 'password', 'email', 'full_name'];
    foreach ($required_fields as $field) {
        if (!isset($data[$field]) || empty($data[$field])) {
            http_response_code(400); // Bad Request
            echo json_encode(array('error' => 'Missing required field: ' . $field));
            exit();
        }
    }

    // Connect to the MySQL database
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "travel_management_system2";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        http_response_code(500); // Internal Server Error
        echo json_encode(array('error' => 'Database connection failed'));
        exit();
    }

    // Sanitize input data
    $username = $conn->real_escape_string($data['username']);
    $password = $conn->real_escape_string($data['password']);
    $email = $conn->real_escape_string($data['email']);
    $full_name = $conn->real_escape_string($data['full_name']);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password, email, full_name) VALUES ('$username', '$password', '$email', '$full_name')";
    if ($conn->query($sql) === TRUE) {
        // User registration successful
        http_response_code(201); // Created
        echo json_encode(array('message' => 'User registered successfully'));
    } else {
        // Error inserting user data
        http_response_code(500); // Internal Server Error
        echo json_encode(array('error' => 'User registration failed'));
    }

    // Close database connection
    $conn->close();
} else {
    // Invalid endpoint or request method
    http_response_code(404); // Not Found
    echo json_encode(array('error' => 'Invalid endpoint'));
}

?>
